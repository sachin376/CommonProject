package test;

import java.util.Scanner;

public class DivAndSpan2 {

	private static final int mod = (int) (Math.pow(10, 7) + 7);

	public static void main(String[] args) {

		Scanner S = new Scanner(System.in);
		int T = S.nextInt();
		
		for (int t = 0; t < T; t++) {
			int count = 0;
			int count1 = 0;
			int X = S.nextInt();
			int Y = S.nextInt();
			
			count = fact(X+Y);
			
			System.out.println("count4 " + count);

			for (int i = 1; i<=Y; i++) {
				count1 = (X + Y - i) * fact(X + Y - i) * someFunc(i);
				count +=count1;
			}
			

			System.out.println("count4 " + count);
		}
		S.close();

	}

	private static int someFunc(int n) {
		int count = 0;
		for (int i = n; i>=0; i++) {
			count = (i) * fact(i);
		}
		return count;
	}

	private static int comb(int n, int i) {
//		return fact(n)/(fact(i)*fact(n-i)% mod);
		int sum =1;
		for(int k=0; k<i;k++){
			sum =  sum * n;
			n--;
		}
		return sum;
	}

	private static int fact(int n) {

		if (n == 1 || n == 0)
			return 1;
		return ((n % mod) * (fact(n - 1) % mod) % mod);
	}

}