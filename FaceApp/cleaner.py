# -*- coding: utf-8 -*-
"""
Created on Mon Feb 20 08:32:06 2017

@author: jmanfre
"""

import os

# For each subject-visit in the working directory, find the highest # file and copy it back to the root
wd = "/Users/jmanfre/Datasets/CK+/CK-images-peak-only"
directories = os.listdir(wd)
for i in range(1,len(directories)):
    subdirectories = os.listdir(wd+"/"+directories[i])
    subj = directories[i]
    for j in range(1,len(subdirectories)):
        visit = subdirectories[j]
        files = os.listdir(wd+"/"+directories[i]+"/"+subdirectories[j])
        target = max(files)
        old = wd+"/"+subj+"/"+visit+"/"+target
        new = wd+"/"+subj+"_"+visit+".png"
        os.rename(old, new)