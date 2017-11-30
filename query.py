#!/usr/bin/env python
import sys
from collections import Counter

def handle_query(query):
    print "Char counts on %s:" % query
    count = Counter(query)
    for c in sorted(count.keys()):
        print "%c : %d" % (c, count[c])

if __name__=="__main__":
    query = str(raw_input().strip()) 
    handle_query(query)
