package utilfunctions;

import java.util.Arrays;

public class SortingAlgos {

	// keep inserting the no at left side of the given index such that Left hand side is always sorted.
	// i.e keep on select no from 1 to n and insert it on LHS at appropriate position
	// virtually creating hole
	public static void sortUsingInsertionAlgo(Integer[] A) {

		int len = A.length;
		int hole = 0;
		int value = 0;
		for (int i = 1; i < len; i++) {
			hole = i;
			value = A[i];
			// Shifting of hole towards left till find its appropriate position
			while (hole > 0 && A[hole - 1] > value) {
				A[hole] = A[hole - 1];
				hole--;
			}
			A[hole] = value;
		}
	}

	// bubble sort - at every pass this wod bubbles out the largest no at the end of the list - RHS
	public static void sortUsingBubbleAlgo(Integer[] A) {
		int len = A.length;
		int tmp = 0;
		for (int i = 0; i < len-1; i++) {
			for (int j = 0; j < len - 1 - i; j++) {
				if (A[j] > A[j + 1]) {
					tmp = A[j];
					A[j] = A[j + 1];
					A[j + 1] = tmp;
				}
			}
		}

	}

	// finding MIN in one pass and put it at appropriate position starting from 0
	public static void sortUsingSelectionAlgo(Integer[] A) {

		int len = A.length;
		int minPos, temp;
		for (int i = 0; i < len - 1; i++) {
			minPos = i;
			for (int j = i + 1; j < len; j++) {
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
