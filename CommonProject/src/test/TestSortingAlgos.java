package test;

import java.util.Arrays;

//import org.hamcrest.collection.IsArrayContainingInOrder;
import org.junit.Assert;
import org.junit.Test;

import utilfunctions.SortingAlgos;

public class TestSortingAlgos {

	
	@Test
	public void testQuickSort() {
		Integer[] A = { 3, 8, 6, 4, 9, 1, 7, 2, 5 };
		System.out.println("Given Array : " + Arrays.toString(A));
		SortingAlgos.quickSort(A, 0, 8);
		System.out.println("After Sorting : " + Arrays.toString(A));
		Integer[] expected = { 1, 2, 3, 4, 5, 6, 7, 8, 9 };
		Assert.assertEquals(Arrays.asList(expected), Arrays.asList(A));
	}
	
	@Test
	public void testMergeSort() {
		Integer[] A = { 3, 8, 6, 4, 9, 1, 7, 2, 5 };
		System.out.println("Given Array : " + Arrays.toString(A));
		SortingAlgos.mergeSort(A);
		System.out.println("After Sorting : " + Arrays.toString(A));
		Integer[] expected = { 1, 2, 3, 4, 5, 6, 7, 8, 9 };
		Assert.assertEquals(Arrays.asList(expected), Arrays.asList(A));
	}
	
	@Test
	public void testInsertionSort() {
		Integer[] A = { 3, 8, 6, 4, 9, 1, 7, 2, 5 };
//		System.out.println("Given Array : " + Arrays.toString(A));
		SortingAlgos.insertionSort(A);
//		System.out.println("After Sorting : " + Arrays.toString(A));
		Integer[] expected = { 1, 2, 3, 4, 5, 6, 7, 8, 9 };
		Assert.assertEquals(Arrays.asList(expected), Arrays.asList(A));
	}

	@Test
	public void testBubbleSort() {
		Integer[] A = { 3, 8, 6, 4, 9, 1, 7, 2, 5 };
//		System.out.println("Given Array : " + Arrays.toString(A));
		SortingAlgos.bubbleSort(A);
//		System.out.println("After Sorting : " + Arrays.toString(A));
		Integer[] expected = { 1, 2, 3, 4, 5, 6, 7, 8, 9 };
		Assert.assertEquals(Arrays.asList(expected), Arrays.asList(A));
	}

	@Test
	public void testSelectionSort() {
		Integer[] A = { 3, 8, 6, 4, 9, 1, 7, 2, 5 };
//		System.out.println("Given Array : " + Arrays.toString(A));
		SortingAlgos.selectionSort(A);
//		System.out.println("After Sorting : " + Arrays.toString(A));
		Integer[] expected = { 1, 2, 3, 4, 5, 6, 7, 8, 9 };
		Assert.assertEquals(Arrays.asList(expected), Arrays.asList(A));

		// for array elements equality
		// Assert.assertThat(new int[]{1,2,3,4,5,6,7,8,9}, IsArrayContainingInOrder.arrayContaining(A));
	}

}
