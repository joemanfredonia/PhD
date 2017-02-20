# Get dem packagez
require("tidyr")
require("pcaMethods")
require("mice")
require("vioplot")

# Load up the data
root = "~/Datasets/ASD002/"
features = read.csv(paste(root,"features_hypotheses.csv",sep=""))
subjects = read.csv(paste(root,"subjects.csv",sep=""))
visits = read.csv(paste(root,"ASD002 Subject Visits.csv",sep=""))
scales = read.csv(paste(root,"ASD002 Scales Data.csv",sep=""))

# Strip 'features' down to only *Funny* & *Facial* features
data = subset(features, grepl("Funny", Feature) | grepl("Facial", Feature))

# Strip 'scales' down to only *ABI MH Anxiety* and *ABI SOCIAL COMMUNICATION* and *ABI SELF REGULATION*
scales = subset(scales, grepl("ABI MH Anxiety", param) | grepl("ABI SOCIAL COMMUNICATION", param) | grepl("ABI SELF REGULATION", param))

# Transpose the 'data' set so each row is a unique SubjectId-Date...sort
data = spread(data, Feature, Value)
data = data[
  with(data, order(SubjectId, Date)),
]

# Transpose the 'scales' set so each row is a unique subjectid-visit
scales = spread(scales[,c("subjectid","visit","param","avail")],param,avail)

# Merge metadata from 'subjects' to 'data' on SUBJ=SubjectId
data = merge(x=data, y=subjects[, c("SUBJ","SEX","ASD","AGE")], by.x="SubjectId", by.y="SUBJ", all.x=TRUE)

# Merge metadata from 'visits' to 'data' on subjectid=subjectid
data = merge(x=data, y=visits, by.x=c("SubjectId", "Date"), by.y=c("subjectid","date"), all.x=TRUE)

# Merge metadata from 'scales' to 'data' on subjectid=subjectid
data = merge(x=data, y=scales, by.x=c("SubjectId", "visit"), by.y=c("subjectid","visit"), all.x=TRUE)

# Re-order the columns
data = data[,c(1,158:160,3,2,161:163,4:157)]
data = data[order(data$SubjectId,data$Date),]

# Lower-case column names please
names(data) = tolower(names(data))

# Remove $asd == NA
data = data[!is.na(data$asd),]

# Make an ASD set
dataASD = data[data$asd=="ASD",]
dataTD = data[data$asd=="TD",]

#########################################
# UNDERPERFORMER / OVERPERFORMER ANALYSIS
#########################################

# Make the empty data frame to store the results
groupstats = data.frame(feature=character(),
                        visit=character(),
                        td.n=integer(),
                        td.mean.feature=numeric(),
                        td.sd.feature=numeric(),
                        grp.lowerbound=numeric(),
                        grp.upperbound=numeric(),
                        up.n=integer(),
                        up.mean.feature=numeric(),
                        up.sd.feature=numeric(),
                        up.mean.abisocial=numeric(),
                        up.sd.abisocial=numeric(),
                        up.mean.abianxiety=numeric(),
                        up.sd.abianxiety=numeric(),
                        up.mean.abisr=numeric(),
                        up.sd.abisr=numeric(),
                        op.n=integer(),
                        op.mean.feature=numeric(),
                        op.sd.feature=numeric(),
                        op.mean.abisocial=numeric(),
                        op.sd.abisocial=numeric(),
                        op.mean.abianxiety=numeric(),
                        op.sd.anxiety=numeric(),
                        op.mean.abisr=numeric(),
                        op.sd.abisr=numeric(),
                        ap.n=integer(),
                        ap.mean.feature=numeric(),
                        ap.sd.feature=numeric(),
                        ap.mean.abisocial=numeric(),
                        ap.sd.abisocial=numeric(),
                        ap.mean.abianxiety=numeric(),
                        ap.sd.anxiety=numeric(),
                        ap.mean.abisr=numeric(),
                        ap.sd.anxiety=numeric(),
                        abisocial.up.op.t.stat=numeric(),
                        abisocial.up.op.p.value=numeric(),
                        abianxiety.up.op.t.stat=numeric(),
                        abianxiety.up.op.p.value=numeric(),
                        abisr.up.op.t.stat=numeric(),
                        abisr.up.op.p.value=numeric(),
                        abisocial.up.ap.t.stat=numeric(),
                        abisocial.up.ap.p.value=numeric(),
                        abianxiety.up.ap.t.stat=numeric(),
                        abianxiety.up.ap.p.value=numeric(),
                        abisr.up.ap.t.stat=numeric(),
                        abisr.up.ap.p.value=numeric(),
                        abisocial.ap.op.t.stat=numeric(),
                        abisocial.ap.op.p.value=numeric(),
                        abianxiety.ap.op.t.stat=numeric(),
                        abianxiety.ap.op.p.value=numeric(),
                        abisr.ap.op.t.stat=numeric(),
                        abisr.ap.op.p.value=numeric(),
                        stringsAsFactors=FALSE)

# We'll need these for the next bit...
nvisits = 2
firstfeature = 9
lastfeature = 163
nfeatures = lastfeature-firstfeature+1
matrixrows = nfeatures*nvisits
matrixcolumns = ncol(groupstats)
namevec = names(groupstats)

# Populate 'groupstats' with empty rows of the appropriate size so we can fill along the way
empty = data.frame(as.character(""),as.character(""),0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,stringsAsFactors=FALSE)
for (i in 1:matrixrows) {
  groupstats = rbind(groupstats, empty)
}
names(groupstats) = namevec 

# Initialize PDF writer
pdf(paste(root,"ASD002 FACET Group Stats.pdf",sep=""))

# Now for each visit type...
for (i in 1:nvisits) {
  
  if (i==1) {
    type = "BASELINE"
  }
  if (i==2) {
    type = "W8 ENDPOINT"
  }
  
  # ...and each feature
  for (j in firstfeature:lastfeature) {
    r = (i-1)*nfeatures+1+j-firstfeature
    curFeature = names(data)[j]
    groupstats$feature[r] = curFeature
    groupstats$visit[r] = type
    
    # Calculate the n, mean, and sd for the TD BASELINE (regardless of i, since that's all we have for TD)
    groupstats$td.n[r] = length(na.omit(dataTD[,curFeature]))
    groupstats$td.mean.feature[r] = mean(na.omit(dataTD[,curFeature]))
    groupstats$td.sd.feature[r] = sd(na.omit(dataTD[,curFeature]))
    
    # Determine the lower and upper froup boundaries
    groupstats$grp.lowerbound[r] = groupstats$td.mean.feature[r]-groupstats$td.sd.feature[r]
    groupstats$grp.upperbound[r] = groupstats$td.mean.feature[r]+groupstats$td.sd.feature[r]
    
    # Separate ASD subjects into 'groups' based on these thresholds and calculate stuff
    up = dataASD[dataASD[curFeature]<groupstats$grp.lowerbound[r]&dataASD$visit==type,]
    up = subset(up, !is.na(up$subjectid))
    groupstats$up.n[r] = nrow(up)
    groupstats$up.mean.feature[r] = mean(as.numeric(as.character(unlist(up[curFeature]))))
    groupstats$up.sd.feature[r] = sd(as.numeric(as.character(unlist(up[curFeature]))))
    groupstats$up.mean.abisocial[r] = mean(as.numeric(as.character(unlist(na.omit(up["abi social communication"])))))
    groupstats$up.sd.abisocial[r] = sd(as.numeric(as.character(unlist(na.omit(up["abi social communication"])))))
    groupstats$up.mean.abianxiety[r] = mean(as.numeric(as.character(unlist(na.omit(up["abi mh anxiety"])))))
    groupstats$up.sd.abianxiety[r] = sd(as.numeric(as.character(unlist(na.omit(up["abi mh anxiety"])))))
    groupstats$up.mean.abisr[r] = mean(as.numeric(as.character(unlist(na.omit(up["abi self regulation"])))))
    groupstats$up.sd.abisr[r] = sd(as.numeric(as.character(unlist(na.omit(up["abi self regulation"])))))
    op = dataASD[dataASD[curFeature]>groupstats$grp.upperbound[r]&dataASD$visit==type,]
    op = subset(op, !is.na(op$subjectid))
    groupstats$op.n[r] = nrow(op)
    groupstats$op.mean.feature[r] = mean(as.numeric(as.character(unlist(op[curFeature]))))
    groupstats$op.sd.feature[r] = sd(as.numeric(as.character(unlist(op[curFeature]))))
    groupstats$op.mean.abisocial[r] = mean(as.numeric(as.character(unlist(na.omit(op["abi social communication"])))))
    groupstats$op.sd.abisocial[r] = sd(as.numeric(as.character(unlist(na.omit(op["abi social communication"])))))
    groupstats$op.mean.abianxiety[r] = mean(as.numeric(as.character(unlist(na.omit(op["abi mh anxiety"])))))
    groupstats$op.sd.abianxiety[r] = sd(as.numeric(as.character(unlist(na.omit(op["abi mh anxiety"])))))
    groupstats$op.mean.abisr[r] = mean(as.numeric(as.character(unlist(na.omit(op["abi self regulation"])))))
    groupstats$op.sd.abisr[r] = sd(as.numeric(as.character(unlist(na.omit(op["abi self regulation"])))))
    ap = dataASD[dataASD[curFeature]<groupstats$grp.upperbound[r]&dataASD[curFeature]>groupstats$grp.lowerbound[r]&dataASD$visit==type,]
    ap = subset(ap, !is.na(ap$subjectid))
    groupstats$ap.n[r] = nrow(ap)
    groupstats$ap.mean.feature[r] = mean(as.numeric(as.character(unlist(ap[curFeature]))))
    groupstats$ap.sd.feature[r] = sd(as.numeric(as.character(unlist(ap[curFeature]))))
    groupstats$ap.mean.abisocial[r] = mean(as.numeric(as.character(unlist(na.omit(ap["abi social communication"])))))
    groupstats$ap.sd.abisocial[r] = sd(as.numeric(as.character(unlist(na.omit(ap["abi social communication"])))))
    groupstats$ap.mean.abianxiety[r] = mean(as.numeric(as.character(unlist(na.omit(ap["abi mh anxiety"])))))
    groupstats$ap.sd.abianxiety[r] = sd(as.numeric(as.character(unlist(na.omit(ap["abi mh anxiety"])))))
    groupstats$ap.mean.abisr[r] = mean(as.numeric(as.character(unlist(na.omit(ap["abi self regulation"])))))
    groupstats$ap.sd.abisr[r] = sd(as.numeric(as.character(unlist(na.omit(ap["abi self regulation"])))))
    
    
    if (nrow(up[curFeature])>0) {
      # save a bunch of box plots... feature, anxiety, social... up,ap,op... (9 total boxes, 18 whiskers)
      up.feature = as.numeric(as.character(unlist(na.omit(up[curFeature]))))
      ap.feature = as.numeric(as.character(unlist(na.omit(ap[curFeature]))))
      op.feature = as.numeric(as.character(unlist(na.omit(op[curFeature]))))
      up.social = as.numeric(as.character(unlist(na.omit(up["abi social communication"]))))
      ap.social = as.numeric(as.character(unlist(na.omit(ap["abi social communication"]))))
      op.social = as.numeric(as.character(unlist(na.omit(op["abi social communication"]))))
      up.anxiety = as.numeric(as.character(unlist(na.omit(up["abi mh anxiety"]))))
      ap.anxiety = as.numeric(as.character(unlist(na.omit(ap["abi mh anxiety"]))))
      op.anxiety = as.numeric(as.character(unlist(na.omit(op["abi mh anxiety"]))))
      up.sr = as.numeric(as.character(unlist(na.omit(up["abi mh anxiety"]))))
      ap.sr = as.numeric(as.character(unlist(na.omit(ap["abi mh anxiety"]))))
      op.sr = as.numeric(as.character(unlist(na.omit(op["abi mh anxiety"]))))
      colors = c("red","yellow","blue","red","yellow","blue","red","yellow","blue","red","yellow","blue")
      boxplot(up.feature,ap.feature,op.feature,up.social,ap.social,op.social,up.anxiety,ap.anxiety,op.anxiety,up.sr,ap.sr,op.sr,
              las=2,
              names=c("UP.feature","AP.feature","OP.feature","UP.social","AP.social","OP.social","UP.anxiety","AP.anxiety","OP.anxiety","UP.sr","AP.sr","OP.sr"),
              main=curFeature,
              col=colors)  
    }
    
    # Run t-test for significant diff between UP & OP on ABI Social Communication...
    y1 = as.numeric(unlist(up["abi social communication"]))
    y2 = as.numeric(unlist(op["abi social communication"]))
    if (length(y1) > 0 & length(y2) > 0) {
      t = t.test(y1, y2, var.equal=F)
      groupstats$abisocial.up.op.t.stat[r]=t$statistic
      groupstats$abisocial.up.op.p.value[r]=t$p.value
    }
    else {
      groupstats$abisocial.up.op.t.stat[r]=NA
      groupstats$abisocial.up.op.p.value[r]=NA
    }
    
    # ... and ABI MH Anxiety
    y1 = as.numeric(unlist(up["abi mh anxiety"]))
    y2 = as.numeric(unlist(op["abi mh anxiety"]))
    if (length(y1) > 0 & length(y2) > 0) {
      t = t.test(y1, y2, var.equal=F)
      groupstats$abianxiety.up.op.t.stat[r]=t$statistic
      groupstats$abianxiety.up.op.p.value[r]=t$p.value
    }
    else {
      groupstats$abianxiety.up.op.t.stat[r]=NA
      groupstats$abianxiety.up.op.p.value[r]=NA
    }
    
    # ... and ABI SELF REGULATION
    y1 = as.numeric(unlist(up["abi self regulation"]))
    y2 = as.numeric(unlist(op["abi self regulation"]))
    if (length(y1) > 0 & length(y2) > 0) {
      t = t.test(y1, y2, var.equal=F)
      groupstats$abisr.up.op.t.stat[r]=t$statistic
      groupstats$abisr.up.op.p.value[r]=t$p.value
    }
    else {
      groupstats$abisr.up.op.t.stat[r]=NA
      groupstats$abisr.up.op.p.value[r]=NA
    }
    
    # Run t-test for significant diff between UP & AP on ABI Social Communication...
    y1 = as.numeric(unlist(up["abi social communication"]))
    y2 = as.numeric(unlist(ap["abi social communication"]))
    if (length(y1) > 0 & length(y2) > 0) {
      t = t.test(y1, y2, var.equal=F)
      groupstats$abisocial.up.ap.t.stat[r]=t$statistic
      groupstats$abisocial.up.ap.p.value[r]=t$p.value
    }
    else {
      groupstats$abisocial.up.ap.t.stat[r]=NA
      groupstats$abisocial.up.ap.p.value[r]=NA
    }
    
    # ... and ABI MH Anxiety
    y1 = as.numeric(unlist(up["abi mh anxiety"]))
    y2 = as.numeric(unlist(ap["abi mh anxiety"]))
    if (length(y1) > 0 & length(y2) > 0) {
      t = t.test(y1, y2, var.equal=F)
      groupstats$abianxiety.up.ap.t.stat[r]=t$statistic
      groupstats$abianxiety.up.ap.p.value[r]=t$p.value
    }
    else {
      groupstats$abianxiety.up.ap.t.stat[r]=NA
      groupstats$abianxiety.up.ap.p.value[r]=NA
    }
    
    # ... and ABI SELF REGULATION
    y1 = as.numeric(unlist(up["abi self regulation"]))
    y2 = as.numeric(unlist(ap["abi self regulation"]))
    if (length(y1) > 0 & length(y2) > 0) {
      t = t.test(y1, y2, var.equal=F)
      groupstats$abisr.up.ap.t.stat[r]=t$statistic
      groupstats$abisr.up.ap.p.value[r]=t$p.value
    }
    else {
      groupstats$abisr.up.ap.t.stat[r]=NA
      groupstats$abisr.up.ap.p.value[r]=NA
    }
    
    # Run t-test for significant diff between AP & OP on ABI Social Communication...
    y1 = as.numeric(unlist(ap["abi social communication"]))
    y2 = as.numeric(unlist(op["abi social communication"]))
    if (length(y1) > 0 & length(y2) > 0) {
      t = t.test(y1, y2, var.equal=F)
      groupstats$abisocial.ap.op.t.stat[r]=t$statistic
      groupstats$abisocial.ap.op.p.value[r]=t$p.value
    }
    else {
      groupstats$abisocial.ap.op.t.stat[r]=NA
      groupstats$abisocial.ap.op.p.value[r]=NA
    }
    
    # ... and ABI MH Anxiety
    y1 = as.numeric(unlist(ap["abi mh anxiety"]))
    y2 = as.numeric(unlist(op["abi mh anxiety"]))
    if (length(y1) > 0 & length(y2) > 0) {
      t = t.test(y1, y2, var.equal=F)
      groupstats$abianxiety.ap.op.t.stat[r]=t$statistic
      groupstats$abianxiety.ap.op.p.value[r]=t$p.value
    }
    else {
      groupstats$abianxiety.ap.op.t.stat[r]=NA
      groupstats$abianxiety.ap.op.p.value[r]=NA
    }
    
    # ... and ABI SELF REGULATION
    y1 = as.numeric(unlist(ap["abi self regulation"]))
    y2 = as.numeric(unlist(op["abi self regulation"]))
    if (length(y1) > 0 & length(y2) > 0) {
      t = t.test(y1, y2, var.equal=F)
      groupstats$abisr.ap.op.t.stat[r]=t$statistic
      groupstats$abisr.ap.op.p.value[r]=t$p.value
    }
    else {
      groupstats$abisr.ap.op.t.stat[r]=NA
      groupstats$abisr.ap.op.p.value[r]=NA
    }
  }
}

# Write the PDF of box plots
dev.off()

# Write the .csv file out
write.csv(groupstats, paste(root,"ASD002 FACET Group Stats.csv",sep=""))


######## TD vs ASD (13, 13+) for FACET features ######

# separate populations by age
u13.td = dataTD[dataTD$age<13 & dataTD$visit=="BASELINE",]
p13.td = dataTD[dataTD$age>=13 & dataTD$visit=="BASELINE",]
u13.asd = dataASD[dataASD$age<13 & dataASD$visit=="BASELINE",]
p13.asd = dataASD[dataASD$age>=13 & dataASD$visit=="BASELINE",]

# create empty data frame
agediff = data.frame(feature=character(),
                        u13.td.n=integer(),
                        u13.td.mean.feature=numeric(),
                        u13.td.sd.feature=numeric(),
                        p13.td.n=integer(),
                        p13.td.mean.feature=numeric(),
                        p13.td.sd.feature=numeric(),
                        u13.asd.n=integer(),
                        u13.asd.mean.feature=numeric(),
                        u13.asd.sd.feature=numeric(),
                        p13.asd.n=integer(),
                        p13.asd.mean.feature=numeric(),
                        p13.asd.sd.feature=numeric(),
                        u13.p.value=numeric(),
                        p13.p.value=numeric(),
                        stringsAsFactors=FALSE)

# We'll need these for the next bit...
firstfeature = 59
lastfeature = 163
nfeatures = lastfeature-firstfeature
matrixrows = nfeatures*nvisits
matrixcolumns = ncol(agediff)
namevec = names(agediff)

# Populate 'agediff' with empty rows of the appropriate size so we can fill along the way
empty = data.frame(as.character(""),0,0,0,0,0,0,0,0,0,0,0,0,0,0,stringsAsFactors=FALSE)
for (i in 1:matrixrows) {
  agediff = rbind(agediff, empty)
}
names(agediff) = namevec 


# for each feature
for (i in firstfeature:lastfeature) {
  r = i-firstfeature+1
  curFeature = names(data)[i]
  agediff$feature[r] = curFeature
  
  # Populate the fields
  agediff$u13.td.n[r]=length(na.omit(u13.td[,curFeature]))
  agediff$u13.td.mean.feature[r]=mean(na.omit(u13.td[,curFeature]))
  agediff$u13.td.sd.feature[r]=sd(na.omit(u13.td[,curFeature]))
  agediff$p13.td.n[r]=length(na.omit(p13.td[,curFeature]))
  agediff$p13.td.mean.feature[r]=mean(na.omit(p13.td[,curFeature]))
  agediff$p13.td.sd.feature[r]=sd(na.omit(p13.td[,curFeature]))
  agediff$u13.asd.n[r]=length(na.omit(u13.asd[,curFeature]))
  agediff$u13.asd.mean.feature[r]=mean(na.omit(u13.asd[,curFeature]))
  agediff$u13.asd.sd.feature[r]=sd(na.omit(u13.asd[,curFeature]))
  agediff$p13.asd.n[r]=length(na.omit(p13.asd[,curFeature]))
  agediff$p13.asd.mean.feature[r]=mean(na.omit(p13.asd[,curFeature]))
  agediff$p13.asd.sd.feature[r]=sd(na.omit(p13.asd[,curFeature]))
  
  # Run t-test for significant diff between ASD U13 and TD U13
  y1 = as.numeric(unlist(na.omit(u13.asd[,curFeature])))
  y2 = as.numeric(unlist(na.omit(u13.td[,curFeature])))
  if (length(y1) > 0 & length(y2) > 0) {
    t = t.test(y1, y2, var.equal=F)
    agediff$u13.p.value[r]=t$p.value
  }
  else {
    agediff$u13.p.value[r]=NA
  }
  
  # ... and between ASD P13 and TD P13
  y1 = as.numeric(unlist(na.omit(p13.asd[,curFeature])))
  y2 = as.numeric(unlist(na.omit(p13.td[,curFeature])))
  if (length(y1) > 0 & length(y2) > 0) {
    t = t.test(y1, y2, var.equal=F, alternative="less")
    agediff$p13.p.value[r]=t$p.value
  }
  else {
    agediff$p13.p.value[r]=NA
  }
}

write.csv(agediff, paste(root,"ASD002 FACET Age Diff.csv",sep=""))
