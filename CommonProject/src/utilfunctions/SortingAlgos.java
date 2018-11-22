package utilfunctions;

import java.util.Arrays;

public class SortingAlgos {

	// 1) Divide & Conquer
	// 2) Recursive calls
	// 3) Not Stable -- i.e position of equal no's change
	// 4) In-place -- i.e don't take extra memory space unlike merge sort
	// 5) O(nlong) in average case and O(n2) in worse case
	// worse case can be avoided using randomized version of quick sort
	public static void quickSort(Integer[] A, int start, int end) {
		if (start < end) { // breaking condition for recursive function
			int pivotIndex = partition(A, start, end);
			quickSort(A, start, pivotIndex - 1);
			quickSort(A, pivotIndex + 1, end);
		}
	}

	private static int partition(Integer[] A, int start, int end) {

		int pivotValue = A[end];
		int pivotIndex = start;
		for (int i = start; i < end; i++) {// not need to access last element end as that was stored into pivot
			if (A[i] <= pivotValue) {
				swap(A, i, pivotIndex);
				pivotIndex++;
			}
		}
		swap(A, pivotIndex, end);
		return pivotIndex;
	}

	private static void swap(Integer[] A, Integer i, Integer j) {
		int tmp = A[i];
		A[i] = A[j];
		A[j] = tmp;
	}

	// 1) Divide & Conquer
	// 2) Recursive calls
	// 3) Stable -- i.e position of equal no's don't change
	// 4) Not in-place -- i.e take extra memory space. Space --> O(n)
	// 5) O(nlong) in worse case
	public static void mergeSort(Integer[] A) {
		int len = A.length;
		if (len < 2)
			return;
		int mid = len / 2;
		Integer[] left = new Integer[mid];
		Integer[] right = new Integer[len - mid];
		for (int i = 0; i < mid; i++) {
			left[i] = A[i];
		}
		for (int i = mid; i < len; i++) {
			right[i - mid] = A[i];
		}
		mergeSort(left);
		mergeSort(right);
		merge(left, right, A); // Merging left and right and put it in same array A
		System.out.println("After pass " + " : " + Arrays.toString(A));
		left = null; // cleaning of extra space
		right = null;
	}

	private static void merge(Integer[] left, Integer[] right, Integer[] A) {

		int leftLen = left.length;
		int rightLen = right.length;
		int a = 0, l = 0, r = 0;
		while (l < leftLen && r < rightLen) {
			if (left[l] < right[r])
				A[a++] = left[l++];
			else
				A[a++] = right[r++];
		}

		for (; l < leftLen; l++, a++) {
			A[a] = left[l];
		}
		for (; r < rightLen; r++, a++) {
			A[a] = right[r];
		}

	}

	// keep inserting the no at left side of the given index such that Left hand side is always sorted.
	// i.e keep on selecting no from 1 to n and insert it on LHS at appropriate position
	// virtually creating hole
	public static void insertionSort(Integer[] A) {
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

	// Bubble out the largest no (by comparing adjacent nos) to the end of the list.
	// bubble sort - at every pass this wod bubbles out the largest no at the end of the list - RHS
	public static void bubbleSort(Integer[] A) {
		int len = A.length;
		for (int i = 0; i < len - 1; i++) {
			for (int j = 0; j < len - 1 - i; j++) {
				if (A[j] > A[j + 1]) {
					swap(A, j, j + 1);
				}
			}
		}

	}

	// Selection of MIN no in first pass (by keep comparing adjacent no) and put it into first position.
	// Keep repeating the above step till end of Array.
	public static void selectionSort(Integer[] A) {
		int len = A.length;
		int minPos;
		for (int i = 0; i < len - 1; i++) {
			minPos = i;
			for (int j = i + 1; j < len; j++) {
				if (A[j] < A[minPos])
					minPos = j;
			}
			swap(A, i, minPos);
			// System.out.println("After pass " + (i + 1) + " : " + Arrays.toString(A));
		}
	}

}
