package test;

import java.util.Arrays;

import org.hamcrest.collection.IsArrayContainingInOrder;
import org.junit.Assert;
import org.junit.Test;

import utilfunctions.SortingAlgos;

public class TestSortingAlgos {

	@Test
	public void testSelectionSort() {
		int[] A = { 3, 8, 6, 4, 9, 1, 7, 2, 5 };
		System.out.println("Given Array : "+Arrays.toString(A));
		SortingAlgos.sortUsingSelectionAlgo(A);
		System.out.println("After Sorting : "+Arrays.toString(A));
		Assert.assertEquals(Arrays.asList(new int[]{1,2,3,4,5,6,7,8,9}), Arrays.asList(A));
//		Assert.assertThat(new int[]{1,2,3,4,5,6,7,8,9}, IsArrayContainingInOrder.arrayContaining(A));
	}
}
