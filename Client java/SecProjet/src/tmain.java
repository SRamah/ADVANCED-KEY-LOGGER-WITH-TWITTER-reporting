import twitter4j.TwitterException;

public class tmain extends Thread {
	public void run(){
		Main m = new Main();
		try {
			m.run();
		} catch (TwitterException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

}
