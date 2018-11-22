package test;

import java.util.Scanner;

public class HackerRank3 {

    public static void main(String[] args) {
        /* Enter your code here. Read input from STDIN. Print output to STDOUT. Your class should be named Solution. */
        Scanner S = new Scanner(System.in);
        int T = S.nextInt();
        StringBuilder sb = new StringBuilder();
        
        for (int t = 0; t < T; t++) {

        	int N = S.nextInt();
        	int K = S.nextInt();
        	boolean flag = true;
        	sb.setLength(0);
        	int temp1 = 0;
        	int temp2 = 0;
        	
        	
        	
        	for(int i=1; i<=N;i++){
        		temp1 = i+K;
        		temp2 = i-K;
        		if(isInRange(temp1, N)){
        			sb.append(temp1+" ");
        		}
        		else if(isInRange(temp2, N)){
        			sb.append(temp2+" ");
        		}
        		else{
        			flag = false;
        			break;
        		}
        	}
        	
        	/*if(K!=0 && N!=K*2){
        		flag = false;
        	}
        	else{
        	
        		for(int i=1; i<=N/2;i++){
        			sb.append((i+K)+" ");
        		}
        		for(int i=N/2+1; i<=N;i++){
        			sb.append((i-K)+" ");
        		}
        		
        	}*/
        	
        	if(!flag)
        		System.out.println(-1);
        	else
        		System.out.println(sb.toString());
			
		}
    
    }

	private static boolean isInRange(int temp, int N) {
		
		if(temp>0 && temp<=N)
			return true;

		return false;
	}
}