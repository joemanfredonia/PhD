# Get dem packagez
require("tidyr")
require("pcaMethods")

# Load up the data
root = "~/Datasets/ASD002/"
features = read.csv(paste(root,"features_hypotheses.csv",sep=""))
subjects = read.csv(paste(root,"subjects.csv",sep=""))

# Strip 'features' down to only *Funny* & *Facial* features
data = subset(features, grepl("Funny", Feature) | grepl("Facial", Feature))

# Transpose the data set so each row is a unique SubjectId-Date...sort
data = spread(data, Feature, Value)
data = data[
  with(data, order(SubjectId, Date)),
]

# Add metadata from 'subjects' to 'features' on SUBJ=SubjectId
data = merge(x=data, y=subjects[, c("SUBJ","SEX","ASD","AGE")], by.x="SubjectId", by.y="SUBJ", all.x=TRUE)
data = data[,c(1:2,157:159,3:156)]

# Lower-case column names please
names(data) = tolower(names(data))

# Create a subset of data for PCA (the continuous vars)
data.train = data[,c(5:159)]
pca = pca(data.train, nPcs=13)

# Clustering to mine "overperformers" / "underperformers" / avg


