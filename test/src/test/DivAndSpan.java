package test;

import java.util.Scanner;

public class DivAndSpan {

	private static final int mod = (int) (Math.pow(10, 7) + 7);

	public static void main(String[] args) {

		Scanner S = new Scanner(System.in);
		int T = S.nextInt();
		
		for (int t = 0; t < T; t++) {
			int count = 0;
			int count1 = 0;
			int X = S.nextInt();
			int Y = S.nextInt();

//			 case 1   - A & B
			count = fact(X + Y);
			System.out.println("count1 " + count);

			// case 2  -- B inside B
			for (int i = 1; Y - i > 0; i++) {
				count1 = fact(X + Y - i) * comb(Y, i);
				count +=count1;
			}
			System.out.println("count2 " + count);

			// case 3  -- A inside A
			for (int i = 1; X - i > 0; i++) {
				count += fact(X + Y - i) * comb(X, i);
			}
			System.out.println("count3 " + count);

			// case 4  -- B inside A
			for (int i = 1; Y - i > 0; i++) {
//				count += fact(X + Y - i) * comb(Y, i)* comb(X, i);
				count += X *count1;
			}
			

			System.out.println("count4 " + count);
		}
		S.close();

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