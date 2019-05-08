require("ppcor")
data <- read.csv("responses.csv")

# CORRELATIONS for ALL
df = data
results <- data.frame(feature.a=character(),
                         feature.b=character(),
                         rho=double(), 
                         pvalue=double(), 
                         n.a=double(),
                         n.b=double(),
                         stringsAsFactors=FALSE) 
n = 1
for (i in c("FeelHappy","FeelSad","FeelAngry","FeelAfraid","FeelSurprised")) {
  for (j in c("PctHappyCorrect","PctSadCorrect","PctAngryCorrect","PctAfraidCorrect","PctSurprisedCorrect","PctNotHappyCorrect","PctNotSadCorrect","TotalPctCorrect")) {
    if (length(which(!is.na(as.numeric(unlist(df[i]))))) > 5 & length(which(!is.na(as.numeric(unlist(df[j]))))) > 5) {
      cor = cor.test(as.numeric(unlist(df[i])),as.numeric(unlist(df[j])),method="pearson")
      feature.a = i
      feature.b = j
      rho = cor$estimate
      pval = cor$p.value
      n.a = length(which(!is.na(as.numeric(unlist(df[i])))))
      n.b = length(which(!is.na(as.numeric(unlist(df[j])))))
      row = c(feature.a, feature.b, rho, pval, n.a, n.b)
      results[n,] = row
      n = n+1
    }
  }
} 
names(results) = c("feature.a","feature.b","rho","pvalue","n.a","n.b")
write.csv(results,"res-cor-all.csv")



# CORRELAITONS for AGEGROUP
results <- data.frame(age.group=character(),
                      feature.a=character(),
                      feature.b=character(),
                      rho=double(), 
                      pvalue=double(), 
                      n.a=double(),
                      n.b=double(),
                      stringsAsFactors=FALSE) 
n = 1
for (k in unique(data$AgeGroup[data$AgeGroup!="#N/A"])) {
  df = data[data$AgeGroup==k,]
  for (i in c("FeelHappy","FeelSad","FeelAngry","FeelAfraid","FeelSurprised")) {
    for (j in c("PctHappyCorrect","PctSadCorrect","PctAngryCorrect","PctAfraidCorrect","PctSurprisedCorrect","PctNotHappyCorrect","PctNotSadCorrect","TotalPctCorrect")) {
      if (length(which(!is.na(as.numeric(unlist(df[i]))))) > 5 & length(which(!is.na(as.numeric(unlist(df[j]))))) > 5) {
        cor = cor.test(as.numeric(unlist(df[i])),as.numeric(unlist(df[j])),method="pearson")
        age.group = k
        feature.a = i
        feature.b = j
        rho = cor$estimate
        pval = cor$p.value
        n.a = length(which(!is.na(as.numeric(unlist(df[i])))))
        n.b = length(which(!is.na(as.numeric(unlist(df[j])))))
        row = c(age.group,feature.a, feature.b, rho, pval, n.a, n.b)
        results[n,] = row
        n = n+1
      }
    }
  } 
}
names(results) = c("age.goup","feature.a","feature.b","rho","pvalue","n.a","n.b")
write.csv(results,"res-cor-age.csv")



# CORRELAITONS for GENDER
results <- data.frame(gender=character(),
                      feature.a=character(),
                      feature.b=character(),
                      rho=double(), 
                      pvalue=double(), 
                      n.a=double(),
                      n.b=double(),
                      stringsAsFactors=FALSE) 
n = 1
for (k in unique(data$Gender[data$Gender!="#N/A"])) {
  df = data[data$Gender==k,]
  for (i in c("FeelHappy","FeelSad","FeelAngry","FeelAfraid","FeelSurprised")) {
    for (j in c("PctHappyCorrect","PctSadCorrect","PctAngryCorrect","PctAfraidCorrect","PctSurprisedCorrect","PctNotHappyCorrect","PctNotSadCorrect","TotalPctCorrect")) {
      if (length(which(!is.na(as.numeric(unlist(df[i]))))) > 5 & length(which(!is.na(as.numeric(unlist(df[j]))))) > 5) {
        cor = cor.test(as.numeric(unlist(df[i])),as.numeric(unlist(df[j])),method="pearson")
        gender = k
        feature.a = i
        feature.b = j
        rho = cor$estimate
        pval = cor$p.value
        n.a = length(which(!is.na(as.numeric(unlist(df[i])))))
        n.b = length(which(!is.na(as.numeric(unlist(df[j])))))
        row = c(gender,feature.a, feature.b, rho, pval, n.a, n.b)
        results[n,] = row
        n = n+1
      }
    }
  } 
}
names(results) = c("age.goup","feature.a","feature.b","rho","pvalue","n.a","n.b")
write.csv(results,"res-cor-gender.csv")



# T-TEST BETWEEN EMOTION GROUPS
results <- data.frame(grouping=character(),
                      feature=character(),
                      t=double(),
                      pvalue=double(), 
                      mean.y=double(),
                      mean.n=double(),
                      n.y=double(),
                      n.n=double(),
                      stringsAsFactors=FALSE)

n = 1
for (k in c("HappyGroup","SadGroup","AngryGroup","AfraidGroup","SurprisedGroup")) {
  df.y = data[data[k]==1,]
  df.n = data[data[k]==0,]
  for (i in c("PctHappyCorrect","PctSadCorrect","PctAngryCorrect","PctAfraidCorrect","PctSurprisedCorrect","PctNotHappyCorrect","PctNotSadCorrect","TotalPctCorrect")) {
    x = df.y[i]
    y = df.n[i]
    t = t.test(x,y)
    grouping = k
    feature = i
    tstat = t$statistic
    pval = t$p.value
    mean.y = mean(df.y[i][!is.na(df.y[i])])
    mean.n = mean(df.n[i][!is.na(df.n[i])])
    n.y = length(which(!is.na(df.y[i])))
    n.n = length(which(!is.na(df.n[i])))
    row = c(grouping, feature, tstat, pval, mean.y, mean.n, n.y, n.n)
    results[n,] = row
    n = n+1
  }
}
write.csv(results,"res-ttest.csv")



# ANCOVA 
df = data
results <- data.frame(feature=character(),
                      pvalue.agegrp=double(),                          
                      pvalue.gender=double(), 
                      pvalue.speaker=double(),
                      pvalue.sad=double(),
                      pvalue.angry=double(),
                      stringsAsFactors=FALSE) 
n = 1
for (i in c("PctHappyCorrect","PctSadCorrect","PctAngryCorrect","PctAfraidCorrect","PctSurprisedCorrect","PctNotHappyCorrect","PctNotSadCorrect","TotalPctCorrect")) {
  lm = lm(unlist(df[i]) ~ factor(df$AgeGroup) + factor(df$Gender) + factor(df$NativeSpeaker) + factor(df$SadGroup) + factor(df$AngryGroup))
  anova = anova(lm)
  feature = i
  pvalue.agegrp = anova$`Pr(>F)`[1]
  pvalue.gender = anova$`Pr(>F)`[2]
  pvalue.speaker = anova$`Pr(>F)`[3]
  pvalue.sad = anova$`Pr(>F)`[4]
  pvalue.angry = anova$`Pr(>F)`[5]
  row = c(feature, pvalue.agegrp, pvalue.gender, pvalue.speaker, pvalue.sad, pvalue.angry)
  results[n,] = row
  n = n+1
}
write.csv(results,"res-ancova.csv")
