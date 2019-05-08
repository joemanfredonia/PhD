#load packages
require(dplyr)
require(tidyr)
require(ppcor)
require(ggplot2)

wd <- getwd()
df <- read.csv(paste(wd,"/df.csv",sep=""))
df$SadGroup = as.factor(df$SadGroup)
df$HappyGroup = as.factor(df$HappyGroup)
df$AngryGroup = as.factor(df$AngryGroup)
df$SurprisedGroup = as.factor(df$SurprisedGroup)
df$AfraidGroup = as.factor(df$AfraidGroup)

p <- ggplot(df, aes(x=SadGroup, y=TotalPctCorrect, fill=SadGroup)) + geom_violin()
p <- p + scale_fill_manual(values=c("#999999","#56B4E9")) + theme_classic()
p

p <- ggplot(df, aes(x=AngryGroup, y=TotalPctCorrect, fill=AngryGroup)) + geom_violin()
p <- p + scale_fill_manual(values=c("#999999","#990000")) + theme_classic()
p

p <- ggplot(df, aes(x=SurprisedGroup, y=TotalPctCorrect, fill=SurprisedGroup)) + geom_violin()
p <- p + scale_fill_manual(values=c("#999999","#009933")) + theme_classic()
p

p <- ggplot(df, aes(x=AfraidGroup, y=TotalPctCorrect, fill=AfraidGroup)) + geom_violin()
p <- p + scale_fill_manual(values=c("#999999","#9966CC")) + theme_classic()
p

p <- ggplot(df, aes(x=HappyGroup, y=TotalPctCorrect, fill=HappyGroup)) + geom_violin()
p <- p + scale_fill_manual(values=c("#999999","#FFCC33")) + theme_classic()
p