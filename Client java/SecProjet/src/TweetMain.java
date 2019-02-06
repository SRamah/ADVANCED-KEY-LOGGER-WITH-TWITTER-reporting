import java.io.BufferedReader;
import java.io.File;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.List;
import twitter4j.Status;
import twitter4j.StatusUpdate;
import twitter4j.Twitter;
import twitter4j.TwitterException;
import twitter4j.TwitterFactory;
import twitter4j.UploadedMedia;
import twitter4j.User;
import twitter4j.auth.AccessToken;
import twitter4j.auth.OAuthAuthorization;
import twitter4j.auth.RequestToken;
import twitter4j.conf.Configuration;
import twitter4j.conf.ConfigurationBuilder;
import twitter4j.media.ImageUpload;
import twitter4j.media.ImageUploadFactory;


public class TweetMain {
	public static void tweetwithimages(String message,String image) throws TwitterException {
		ConfigurationBuilder twitterConfigBuilder = new ConfigurationBuilder();
	    twitterConfigBuilder.setDebugEnabled(true);
	    twitterConfigBuilder.setOAuthConsumerKey("kPjjKOnvhn0EmUb0ZIf8Hxds9");
	    twitterConfigBuilder.setOAuthConsumerSecret("89vPVQ5nbSk5wsopP6BCjSD1gpBGb96JpZH1pefxtbeOTfy6j8");
	    twitterConfigBuilder.setOAuthAccessToken("735554813233106944-CuamEAV0Mv082lHMZPDoc6sTtNZlfHG");
	    twitterConfigBuilder.setOAuthAccessTokenSecret("t2YxSnyWheCwT49e6weG59oEicpXZEeHEAZxwiY6wRbAy");

	    Twitter twitter = new TwitterFactory(twitterConfigBuilder.build()).getInstance();
	    
	    File imagefile1 = new File(image);
	   

	    long[] mediaIds = new long[1];
	    UploadedMedia media1 = twitter.uploadMedia(imagefile1);
	    mediaIds[0] = media1.getMediaId();
	    

	    StatusUpdate statusUpdate = new StatusUpdate(Security.encrypt(message, "BDSAS20152017001"));
	    statusUpdate.setMediaIds(mediaIds);
	    Status status = twitter.updateStatus(statusUpdate);
	      
	}
public static void Tweet(String message ) throws Exception {
ConfigurationBuilder cb = new ConfigurationBuilder();
		cb.setDebugEnabled(true)
		.setOAuthConsumerKey("kPjjKOnvhn0EmUb0ZIf8Hxds9")
		.setOAuthConsumerSecret("89vPVQ5nbSk5wsopP6BCjSD1gpBGb96JpZH1pefxtbeOTfy6j8")
		.setOAuthAccessToken("735554813233106944-CuamEAV0Mv082lHMZPDoc6sTtNZlfHG")
		.setOAuthAccessTokenSecret("t2YxSnyWheCwT49e6weG59oEicpXZEeHEAZxwiY6wRbAy");
TwitterFactory tf = new TwitterFactory(cb.build());
Twitter twitter = tf.getInstance();     
Status status;
//ImageUpload upload = new ImageUploadFactory(cb).getInstance(auth);
try {
			
			String messagecry = Security.encrypt(message, "BDSAS20152017001") ;
			status = twitter.updateStatus(messagecry);
System.out.println("Successfully updated the status to [" + status.getText() + "].");
		} catch (TwitterException e) {
// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
}