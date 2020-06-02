import sys

def detector(user_input,our_input):
    import re
    import nltk
    import gensim
    import numpy as np
    from nltk.tokenize import word_tokenize, sent_tokenize
    from gensim.models import TfidfModel
    from gensim.corpora import Dictionary
    space = r"\.(?=\S)"
    user_input = re.sub(space, ". ", user_input)
    our_input = re.sub(space, ". ", our_input)
    
    file_docs=[]
    tokens=sent_tokenize(our_input)
    for line in tokens:
        file_docs.append(line)
    gen_docs = [[w.lower() for w in word_tokenize(text)] 
                for text in file_docs]
    dictionary = gensim.corpora.Dictionary(gen_docs)
    corpus = [dictionary.doc2bow(gen_doc) for gen_doc in gen_docs]
    tf_idf = gensim.models.TfidfModel(corpus)
    sims = gensim.similarities.Similarity('hello/',tf_idf[corpus],num_features=len(dictionary))
    file2_docs = []
    real=0
    realcount=0
    fakecount=0
    countnonzero=0
    matchdateR=0
    matchc=0
    matchr=0
    tokens = sent_tokenize(user_input)
    for line in tokens:
        file2_docs.append(line)
    for line in file2_docs:
            query_doc = [w.lower() for w in word_tokenize(line)]
            query_doc_bow = dictionary.doc2bow(query_doc)
            query_doc_tf_idf = tf_idf[query_doc_bow]
            maxinthearray=(np.max(sims[query_doc_tf_idf]))
            sumnumpy=(np.sum(sims[query_doc_tf_idf], dtype=np.float32))
            countnonzero=countnonzero + np.count_nonzero(sims[query_doc_tf_idf])
            sumnumpy+=sumnumpy
            if(maxinthearray>=0.45):
                real=real+1
                realcount+=1
                matchdateR=matchdateR+maxinthearray
                matchr=matchr+maxinthearray
                matchc=matchc+maxinthearray
            else:
                real=real-1
                fakecount+=1
                matchdateR=matchdateR-maxinthearray
                matchc=matchc+maxinthearray
    print (maxinthearray*100)

     

    # ifreal=(((realcount)/(realcount+fakecount))*100) 

    # if (real>=1):
    #     print(ifreal)
    # elif real==0:
    #     print("unknown")

    
    # else:
    #     print(ifreal)

if __name__ == "__main__":
    detector(sys.argv[1],sys.argv[2])
