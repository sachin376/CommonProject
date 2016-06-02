package test;

import java.util.Arrays;
import java.util.List;

import org.hamcrest.collection.IsIterableContainingInOrder;
import org.junit.Assert;
import org.junit.Test;

import utilfunctions.MathUtilFunctions;

public class TestMathUtilFunctions {

	@Test
	public void testFactorsGivenHappyInput() {
		List<Integer> ls = MathUtilFunctions.findFactors(6);
		// System.out.println(ls);
		 Assert.assertEquals(Arrays.asList(new Integer[]{1,2,3,6}), ls);

//		 List<Integer> actualList = Arrays.asList(new Integer[] { 1, 2, 3, 6 });
//		 for array elements equality
//		 assertThat(coll1, IsArrayContainingInOrder.arrayContaining(coll2));

//		 for collections elements equality
//		Assert.assertThat(actualList, IsIterableContainingInOrder.contains(ls.toArray()));
	}

	@Test
	public void testFactorsGivenLowerBoundInput() {
		List<Integer> ls = MathUtilFunctions.findFactors(1);
		Assert.assertEquals(Arrays.asList(new Integer[]{1}), ls);
	}
	
	@Test
	public void testFactorsGivenPrime() {
		List<Integer> ls = MathUtilFunctions.findFactors(13);
		Assert.assertEquals(Arrays.asList(new Integer[]{1, 13}), ls);
	}
	
	@Test
	public void testFactorsGivenPerfectSquare() {
		List<Integer> ls = MathUtilFunctions.findFactors(36);
//		System.out.println(ls);
		Assert.assertEquals(Arrays.asList(new Integer[]{1,2,3,4,6,9,12,18,36}), ls);
	}
	
	@Test
	public void testPrimesGivenHappyInput() {
		List<Integer> ls = MathUtilFunctions.findPrimes(20);
//		System.out.println(ls);
		List<Integer> actualList = Arrays.asList(new Integer[] {2,3,5,7,11,13,17,19});
		Assert.assertEquals(actualList, ls);
	}
	
	@Test
	public void testPrimesGivenLowerBoundInput() {
		List<Integer> ls = MathUtilFunctions.findPrimes(1);
		Assert.assertEquals(Arrays.asList(new Integer[]{}), ls);
	}
	
	@Test
	public void testPrimesGivenPrime() {
		List<Integer> ls = MathUtilFunctions.findPrimes(13);
		Assert.assertEquals(Arrays.asList(new Integer[]{2,3,5,7,11,13}), ls);
	}
	
	@Test
	public void testPrimeGiven7() {
		Assert.assertEquals(true, MathUtilFunctions.isPrime(7));
	}
	
	@Test
	public void testPrimeGiven1() {
		Assert.assertEquals(false, MathUtilFunctions.isPrime(1));
	}
	
	@Test
	public void testPrimeGiven2() {
		Assert.assertEquals(true, MathUtilFunctions.isPrime(2));
	}
	
	@Test
	public void testPrimeGiven10() {
		Assert.assertEquals(false, MathUtilFunctions.isPrime(10));
	}
	
	@Test
	public void testPrimeGiven17() {
		Assert.assertEquals(true, MathUtilFunctions.isPrime(7));
	}
	
	@Test
	public void testPrimeGiven0() {
		Assert.assertEquals(false, MathUtilFunctions.isPrime(0));
	}
	
//	GCD(105,350) = 35
	@Test
	public void testGCDRecursiveGivenHappyNos() {
		Assert.assertEquals(35, MathUtilFunctions.findGCD_ByEuclid_Recursion(105, 350));
	}

//	GCD(105,350) = 35
	@Test
	public void testGCDGivenHappyNos() {
		Assert.assertEquals(35, MathUtilFunctions.findGCD_ByEuclid_Recursion(105, 350));
	}
}
