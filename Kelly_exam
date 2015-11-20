from statistics import median, mean
from itertools import permutations


def combine_digits(hun, ten, one):
	return 100*hun+10*ten+one


def create_scores(digits):
	scores = []
	a,b,c,d,e,f,g,h,i,j = digits
	
	scores.append(combine_digits(0,a,b))
	scores.append(combine_digits(0,a,b))
	scores.append(combine_digits(0,a,b))
	scores.append(combine_digits(0,a,c))
	scores.append(combine_digits(0,a,e))
	scores.append(combine_digits(0,a,f))
	scores.append(combine_digits(0,a,h))
	scores.append(combine_digits(0,a,h))
	scores.append(combine_digits(0,a,h))
	scores.append(combine_digits(0,a,i))
	scores.append(combine_digits(0,a,i))
	scores.append(combine_digits(0,c,g))
	scores.append(combine_digits(0,d,b))
	scores.append(combine_digits(0,d,h))
	scores.append(combine_digits(0,d,h))
	scores.append(combine_digits(0,e,f))
	scores.append(combine_digits(e,f,b))
	scores.append(combine_digits(e,f,b))
	scores.append(combine_digits(0,f,e))
	scores.append(combine_digits(0,f,e))
	scores.append(combine_digits(0,f,e))
	scores.append(combine_digits(0,f,g))
	scores.append(combine_digits(0,f,h))
	scores.append(combine_digits(g,e,c))
	scores.append(combine_digits(g,e,d))
	scores.append(combine_digits(0,h,j))
	scores.append(combine_digits(0,i,e))
	scores.append(combine_digits(0,i,h))
	scores.append(combine_digits(0,j,b))
	scores.append(combine_digits(0,j,c))
	scores.append(combine_digits(0,j,c))
	scores.append(combine_digits(0,j,h))
	scores.append(combine_digits(0,j,i))
	scores.append(combine_digits(0,j,i))
	scores.append(combine_digits(0,j,j))
	scores.append(combine_digits(0,j,j))
	return scores


for digits in permutations([0,1,2,3,4,5,6,7,8,9]):
	a,b,c,d,e,f,g,h,i,j = digits
	scores = create_scores(digits)

	min_score = combine_digits(0,e,f)
	max_score = combine_digits(g,e,d)
	if min(scores) == min_score and max(scores) == max_score:
		med = combine_digits(0,a,b)
		if med == median(scores):
			avg = 10*j+i+e/10+d/100+i/1000
			m = mean(scores)
			if (abs(m-avg) < .001):
				print("a. {0}".format(a))
				print("b. {0}".format(b))
				print("c. {0}".format(c))
				print("d. {0}".format(d))
				print("e. {0}".format(e))
				print("f. {0}".format(f))
				print("g. {0}".format(g))
				print("h. {0}".format(h))
				print("i. {0}".format(i))
				print("j. {0}".format(j))
				print("min {0}".format(min_score))
				print("max {0}".format(max_score))
				print("med {0}".format(med))
				print("avg {0}, {1}{2}.{3}{4}{5}\n".format(m,j,i,e,d,i))
