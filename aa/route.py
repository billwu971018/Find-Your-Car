import sys
from geopy.geocoders import Nominatim
from geopy.distance import great_circle
from scipy.sparse import csr_matrix
from scipy.sparse.csgraph import minimum_spanning_tree
import numpy as np

argv = sys.argv[1:]
#print(argv)
last = 0
addr = []
for i in range(len(argv)):
    if argv[i] == "@":
        curr = argv[last:i]
        a = ' '.join(curr)
        addr.append(a)
        last = i + 1


geolocator = Nominatim(user_agent="find best route")
locations = []
for curr in addr:
    location = geolocator.geocode(curr)
    loc = (location.latitude, location.longitude)
    locations.append(loc)

n = len(addr)
matrix = np.zeros((n, n))
for i in range(n):
    for j in range(i+1, n, 1):
        dist = great_circle(locations[i], locations[j]).miles
        matrix[i][j] = dist

X = csr_matrix(matrix)
Tcsr = minimum_spanning_tree(X)
ret = Tcsr.toarray()
#print(ret)

count = np.zeros(n)
edge = {}
for i in range(n):
    edge[i] = []

#print(edge)
for i in range(n):
    for j in range(n):
        if ret[i][j] != 0:
            count[i] += 1
            count[j] += 1
            edge[i].append(j)
            edge[j].append(i)

select = 0
for c in range(len(count)):
    if count[c] == 1:
        select = c
        break

route = []
#print(count)
#print(select)
route.append(addr[select])
rem = n-1
curr = select
while rem > 0:
    next = edge[curr][0]
    edge[next].remove(curr)
    curr = next
    route.append(addr[curr])
    rem -= 1

retStr = " -> ".join(route)
print("The shortest visiting route is: ")
print(retStr)
