package utilfunctions;

import java.util.Arrays;

public class SortingAlgos {

	// finding MIN in one pass and put it at appropriate pos
	public static void sortUsingSelectionAlgo(int[] A) {

		int n = A.length;
		int minPos, temp;
		for (int i = 0; i < n - 1; i++) {
			minPos = i;
			for (int j = i + 1; j < n; j++) {
				if (A[j] < A[minPos])
					minPos = j;
			}
			// swap(A[i],A[minPos]);
			temp = A[i];
			A[i] = A[minPos];
			A[minPos] = temp;

			System.out.println("After pass " + (i + 1) + " : " + Arrays.toString(A));
		}

	}

}
