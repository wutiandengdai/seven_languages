m = rand(10)
n = 11
puts 'Guess a number from 1 to 10'
until m==n
	n=gets().to_i()
	if m < n
		puts "Oh, too big. Try again?\n"	
	elsif m > n
		puts "Oh, too small. Try again?\n"	
	end
end
puts "Congratulations , you got the right number #{m}!"