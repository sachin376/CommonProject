package test;

public class Test {
    public boolean isPower(int n) {
        
        if(n==1)
            return true;
        
        int MAX = (int)Math.sqrt(n)+1;
        boolean[] notPrime = new boolean[MAX+1];
        notPrime[0] = notPrime[1] = true;
        for(int i=2; i<=MAX; i++){
            if(!notPrime[i]){
                for(int j=2; i*j<=MAX; j++){
                    notPrime[i*j] =  true;
                }
            }
        }
        
        for(int i=2; i<=MAX; i++){
            int temp = n;
            int count = 0;
            while(!notPrime[i] && temp %i ==0){
                temp /=i;
                count++;
                if(temp ==1 && count>1)
                    return true;
            }
        }
        return false;
    }
}
