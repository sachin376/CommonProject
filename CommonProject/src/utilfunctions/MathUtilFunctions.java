package utilfunctions;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

public class MathUtilFunctions {

	// input 6
	// output {1,2,3,6}
	public static List<Integer> findFactors(int n) {

		List<Integer> factors = new ArrayList<Integer>();
		// Special case when n==1
		if (n == 1) {
			factors.add(1);
			return factors;
		}

		// Always add 1 and n in the set
		factors.add(1);
		factors.add(n);

		// Loop should be less than equal to sqrt. i.e i<=sqrt
		// But I have chosen less than sqrt as equal case i will handle Separately. i.e i<sqrt
		// This will help me not to check equality condition all the time.
		// also if a is factor then n/a is also a factor
		int sqrt = (int) Math.sqrt(n);
		for (int i = 2; i < sqrt; i++) {
			if (n % i == 0) {
				factors.add(i);
				factors.add(n / i);
			}
		}
		// i==sqrt condition checked here separately
		if (n % sqrt == 0) {
			factors.add(sqrt);
			if (sqrt != n / sqrt)
				factors.add(n / sqrt);
		}

		Collections.sort(factors);
		return factors;
	}

	// Using Sieve of Eratosthenes technique
	// complexity is O(n*log(log n))
	public static List<Integer> findPrimes(int n) {

		List<Integer> result = new ArrayList<Integer>();
		if (n <= 1) {
			// returning empty list.. below line might not work in some env as it would return empty list of Object (not integer)
			// return Collections.emptyList();
			return result;
		}

		// all false means all no are primes at initial stage
		boolean[] isNotPrime = new boolean[n + 1];

		// iterate and put false where no's are not prime
		isNotPrime[0] = isNotPrime[1] = true;
		for (int i = 2; i <= Math.sqrt(n); i++) {
			// if 2 is prime then all multiple of 2 should not be prime
			if (!isNotPrime[i]) {
				for (int j = 2; i * j <= n; j++) {
					isNotPrime[i * j] = true;
				}

			}
		}

		for (int i = 2; i <= n; i++) {
			if (!isNotPrime[i])
				result.add(i);
		}
		return result;
	}

	public static boolean isPrime(int n) {
		if (n <= 1)
			return false;
		for (int i = 2; i <= Math.sqrt(n); i++) {
			if (n % i == 0) {
				return false;
			}
		}
		return true;
	}

	// Euclid's way to find GCD (greatest common divisor) Ex GCD(105,350) is 35
	// divident and divisor can be swap. their wont be any problem as the algo is taking care of it automatically
	// time complexity is O(log(divisor))
	public static int findGCD_ByEuclid_Recursion(int divident, int divisor) {
		return (divisor == 0) ? divident : findGCD_ByEuclid_Recursion(divisor, divident % divisor);
	}

	// Euclid's way to find GCD (greatest common divisor) Ex GCD(105,350) is 35
	// divident and divisor can be swap. their wont be any problem as the algo is taking care of it automatically
	// time complexity is O(log(divisor))
	public static int findGCD_ByEuclid(int divident, int divisor) {
		int reminder;
		while (divisor != 0) {
			reminder = divident % divisor;
			divident = divisor;
			divisor = reminder;
		}
		return divident;
	}

	// Still to implement
	// LCM --> least common multiple. Ex LCM(4,6) is 12.

}
