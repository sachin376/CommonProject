package test;

import java.util.ArrayList;
import java.util.Collections;
import java.util.HashMap;
import java.util.HashSet;
import java.util.Iterator;
import java.util.LinkedList;
import java.util.List;
import java.util.Map;
import java.util.Queue;
import java.util.Scanner;
import java.util.Set;

public class GraphBSTImp {

	private static Graph g;
	private static Scanner input;
	private static BFSTraversal bfsTraversal;
	private static String[] color;
	private static Node[] nodes;
	private static int a[];
	private static int b[];

	public static void main(String[] args) {
		input = new Scanner(System.in);
		int N = input.nextInt();
		color = new String[N];
		nodes = new Node[N];
		for (int n = 0; n < N; n++) {
			color[n] = String.valueOf(input.nextInt());
			nodes[n] = new Node(n+1, color[n]);
		}

		takeGraphInput(N);
		

//		bfsTraversal = new BFSTraversal(g, new Node(1, color[0]));

/*		Map<Node, List<Node>> edges = bfsTraversal.getG().getEdges();

		for (Node node : edges.keySet()) {
			System.out.println("Key = " + node.toString() + "   adjacent list = " + edges.get(node));
		}
*/
		for (int i = 1; i <= N; i++) {
			int sum = 0;
			makeGraph(N);
			for (int j = 1; j <= N; j++) {
//				sum += countColor(new Node(i, color[i - 1]), j);
//				System.out.println("latest ******************  "+nodes[j-1].getColor());
				sum += countColor(nodes[i-1], j);
				
			}

			System.out.println(sum);

		}
		g = null;
		input.close();

	}

	private static int countColor(Node i, int j) {
		System.out.println("*****i,j = "+i.getId()+","+j);

		bfsTraversal = new BFSTraversal(g, i);
		while (bfsTraversal.hasNext()) { 
			Node node = bfsTraversal.next();
			
			if (node.getId() == j) {
//				System.out.println("color code of destination node = "+node.getColor());
				Set<Character> colorSet = new HashSet<Character>();
				for (char a : node.getColor().toCharArray()) {
					colorSet.add(a);
				}
//				System.out.println("returning ="+colorSet.size());
				return colorSet.size();
			}
		}
		bfsTraversal = null;
		return 0;
	}

	public static void takeGraphInput(int N) {
//		g = new Graph();
		int a[] = new int[N];
		int b[] = new int[N];

		// start taking input
		// making graph from the inputs
		for (int n = 0; n < N - 1; n++) {
			a[n] = input.nextInt();
			b[n] = input.nextInt();
		}
	}
	
	public static void makeGraph(int N) {
		g = new Graph();
		for (int n = 0; n < N - 1; n++) {
			g.addEdge(new Node(a[n], color[a[n] - 1]), new Node(b[n], color[b[n] - 1]));
			g.addEdge(new Node(b[n], color[b[n] - 1]), new Node(a[n], color[a[n] - 1]));

		}
	}

}

class BFSTraversal implements Iterator<Node> {

	private Set<Node> visited = new HashSet<Node>();
	private Graph g;
	private Queue<Node> queue = new LinkedList<Node>();
	// private int levelCount = 0 ;

	public BFSTraversal(Graph g, Node start) {
		this.g = g;
		start.setLevel(0);
		queue.add(start);
		visited.add(start);
	}

	@Override
	public boolean hasNext() {
		return !queue.isEmpty();
	}

	@Override
	public Node next() {
		Node next = queue.remove();
		System.out.println("remove node from queue = "+next);
		List<Node> neighbors = g.getNeighbors(next);

		for (Node node : neighbors) {

			System.out.println("neighbor node = "+node);
			
			if (node.getLevel() > next.getLevel()) {
				node.setLevel(next.getLevel() + 1);
			}
			if (!visited.contains(node)) {
				node.setLevel(next.getLevel() + 1);
				node.setColor(next.getColor()+node.getColor());
				visited.add(node);
				queue.add(node);
			}

		}
		return next;
	}

	public Graph getG() {
		return g;
	}

}

class Graph {

	private Map<Node, List<Node>> edges = new HashMap<Node, List<Node>>();

	public void addEdge(Node source, Node target) {

		List<Node> neighbors = edges.get(source);
		if ((neighbors) == null) {
			neighbors = new ArrayList<Node>();
			edges.put(source, neighbors);
		}
		neighbors.add(target);
	}

	public List<Node> getNeighbors(Node node) {
		if (edges.get(node) == null) {
			return Collections.emptyList();
		}
		return edges.get(node);
	}

	public Map<Node, List<Node>> getEdges() {
		return edges;
	}

}

class Node {

	private int id;
	private int level;
	private String color;

	public Node(int id, String color) {
		this.id = id;
		this.color = color;
	}

	public String getColor() {
		return color;
	}

	public void setColor(String color) {
		this.color = color;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public int getLevel() {
		return level;
	}

	public void setLevel(int level) {
		this.level = level;
	}

	@Override
	public int hashCode() {
		return 31 * id;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Node other = (Node) obj;
		if (id == other.id) {
			return true;
		}
		return false;
	}

	@Override
	public String toString() {

		return "id :" + id + "color : " + color+" level : "+level;
	}

}
