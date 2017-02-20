# -*- coding: utf-8 -*-
"""
Created on Mon Feb 20 08:32:06 2017

@author: jmanfre
"""

import os
import pandas

# Create the empty pandas data frame
df = pandas.DataFrame(columns=['Image','Type','Code','Value'])
path_out = "/Users/jmanfre/Datasets/CK+/ck_tag_data.csv"

# For each subject-visit in the working directory, get the FACS data and write to the data frame
facs = "/Users/jmanfre/Datasets/CK+/FACS"
directories = os.listdir(facs)
for i in range(1,len(directories)):
    subdirectories = os.listdir(facs+"/"+directories[i])
    subj = directories[i]
    for j in range(0,len(subdirectories)):
        if subdirectories[j]!='.DS_Store':
            visit = subdirectories[j]
            image = subj+"_"+visit
            if os.listdir(facs+"/"+directories[i]+"/"+subdirectories[j])!=[]:
                facsfile = os.listdir(facs+"/"+directories[i]+"/"+subdirectories[j])[0]
                facsfilepath = facs+"/"+directories[i]+"/"+subdirectories[j]+"/"+facsfile
                # Read the FACS file and extract the FACS codes
                facsdata = pandas.read_csv(facsfilepath,header=None,delim_whitespace=True)
                for k in range(0,len(facsdata.index)):
                    array = {'Image': image, 'Type': "FACS", 'Code': facsdata.ix[k,0], 'Value': facsdata.ix[k,1]}
                    df = df.append(array, ignore_index=True)
                
# Do it again for Emotion
emotion = "/Users/jmanfre/Datasets/CK+/Emotion"
directories = os.listdir(emotion)  
for i in range(1,len(directories)):
    subdirectories = os.listdir(emotion+"/"+directories[i])
    subj = directories[i]
    for j in range(0,len(subdirectories)):
        if subdirectories[j]!='.DS_Store':
            visit = subdirectories[j]
            image = subj+"_"+visit
            if os.listdir(emotion+"/"+directories[i]+"/"+subdirectories[j])!=[]:
                emfile = os.listdir(emotion+"/"+directories[i]+"/"+subdirectories[j])[0]
                emfilepath = emotion+"/"+directories[i]+"/"+subdirectories[j]+"/"+emfile
                # Read the FACS file and extract the FACS codes
                emdata = pandas.read_csv(emfilepath,header=None,delim_whitespace=True)
                for k in range(0,len(emdata.index)):
                    array = {'Image': image, 'Type': "Emotion", 'Code': emdata.ix[k,0], 'Value': 1}
                    df = df.append(array, ignore_index=True)

print(df)
df.to_csv(path_out)
