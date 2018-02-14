import matplotlib.pyplot as plt

f = open('PoGo_Dataset.csv', 'r')
for line in f.readlines()[1:]:
	columns = line.split(',')
	level, distance = int(columns[2]), min(int(columns[4]),4000)
	plt.plot(level, distance, 'ro')

# axes = fig.add_subplot(111)
# axes.set_xticklabels(arr_sizes)
plt.ylabel('distance walked')
plt.xlabel('trainer level')
plt.suptitle('PoGo UCB Data')

plt.savefig('graph.png')
plt.show()