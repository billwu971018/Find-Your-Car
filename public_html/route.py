import sys
from geopy.geocoders import Nominatim
from geopy.distance import great_circle
from itertools import permutations
import numpy as np
import operator

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
        matrix[j][i] = dist

arr = []

for i in range(n):
    arr.append(i)
#print(arr)
perm = permutations(arr)
routes = []
for i in list(perm):
    routes.append(i)
r_dist = {}
for r in routes:
    dist = 0
    for i in range(len(r)-1):
        dist += matrix[r[i]][r[i+1]]
    r_dist[r] = dist
sorted_d = sorted(r_dist.items(), key=operator.itemgetter(1))
ret = sorted_d[0][0]
#print(ret)
print("The shortest visiting route is: ")
retAddr = []
for i in ret:
    retAddr.append(addr[i])
str = " -> ".join(retAddr)
print(str)
