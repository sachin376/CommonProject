package test;

import java.util.Scanner;

public class HackerRank2 {

    public static void main(String[] args) {
        /* Enter your code here. Read input from STDIN. Print output to STDOUT. Your class should be named Solution. */
        Scanner S = new Scanner(System.in);
        int N = S.nextInt();
        int K = S.nextInt();
        S.nextLine();
        String temp = S.next();
        int[] num = new int[N];
        int k =0;
        boolean flag = true;
        boolean[] changed = new boolean[N/2];
        
        //String temp = NUM.toString();
        for(int i=0; i<N/2; i++){
            num[i]=temp.charAt(i)-'0';
            num[N-i-1]= temp.charAt(N-i-1)-'0';
            
            if(num[i] < num[N-i-1]){
                k++;
                changed[i]=true;
                num[i]=num[N-i-1];
            }
            else if(num[i] > num[N-i-1]){
                k++;
                changed[i]=true;
                num[N-i-1]=num[i];
            }
            if(k>K){
                flag = false;
            }
            
        }
        
        for(int j=0; j<N/2;j++){
			if(num[j]!=9){
				if( k+1<K && !changed[j] ){
					num[j]=9;
					num[N-j-1]=9;
					k+=2;
				}
				if( k<K && changed[j] ){
					num[j]=9;
					num[N-j-1]=9;
					k++;
				}
			}
		}

		
		
		if(N%2==1){
			if(k<K){
				num[N/2]=9;
				k++;
			}else{
				num[N/2]=temp.charAt(N/2)-'0';
			}
		}
		
        
        if(!flag){
            System.out.println(-1);
        }
        else{
            for(int i=0; i<N; i++){
            System.out.print(num[i]);
            }    
        }
    }
}