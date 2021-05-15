package glms;
import org.openqa.selenium.By;  
import org.openqa.selenium.WebDriver;  
import org.openqa.selenium.chrome.ChromeDriver;  
  
public class adminindex {
	public static void main(String[] args) {  
        
	    // declaration and instantiation of objects/variables  
	    System.setProperty("webdriver.chrome.driver", "C:\\chrome driver\\chromedriver.exe");  
	    WebDriver driver=new ChromeDriver();  
	    
	    //driver.manage().timeouts().ImplicitlyWait(TimeSpan.FromSeconds(5));
	      
	    // Launch website  
	    driver.navigate().to("http://localhost/EventManagementSystem/index.php");
	    
	    
	    //LOGIN 
	    //click on the login button
	    driver.findElement(By.linkText("Login")).click();
	    
	    //user name
	    driver.findElement(By.cssSelector("body > form.loginform > input[type=text]:nth-child(9)")).sendKeys("AUTAR001");

	    //password
	    driver.findElement(By.cssSelector("body > form.loginform > input[type=password]:nth-child(13)")).sendKeys("aaaaa001");

	    //otp
	    driver.findElement(By.cssSelector("body > form.loginform > input[type=password]:nth-child(17)")).sendKeys("12345");

	    //login button
	    driver.findElement(By.className("xyzz")).click();
	    
	    //pop up
	    driver.switchTo().alert().accept();
	    
	    // Click on the search text box and send value  
	    //driver.findElement(By.name("searchevent")).sendKeys("Artificial Intelligence");  
	    //driver.findElement(By.name("searchevent")).sendKeys("Talk on Cyber security");  
	    
	    // Click on the search button  
	    //driver.findElement(By.name("search")).click(); 
	    
	    //Click on top button to move to top
	    //driver.findElement(By.id("top")).click();
	    
	    
	    //Click on the more details text box and send value  
	    //driver.findElement(By.name("more_detail")).sendKeys("Artificial Intelligence");
	    //driver.findElement(By.name("more_detail")).sendKeys("Talk on Cyber security");     

	    //click on home link to goto index page
	    //driver.findElement(By.linkText("Home")).click();
	    
	    //MyProfile
	    //driver.findElement(By.linkText("My Profile")).click();
	    driver.get("http://localhost/EventManagementSystem/my_profile.php");

	    
	    //MyBookings
	    //driver.findElement(By.linkText("My Booking")).click();
	    //driver.get("http://localhost/EventManagementSystem/my_booking.php");

	    
	    //Queries Page
	    //driver.findElement(By.linkText("Queries Page")).click();
	    //driver.get("http://localhost/EventManagementSystem/queriespage1.php");
	    
	    //Admin management
	    //driver.findElement(By.linkText("Admin Management")).click();
	    //driver.get("http://localhost/EventManagementSystem/admin_manage.php");


	    
	    
	    //Change Password
	    //driver.findElement(By.linkText("change Password")).click();
	    //driver.get("http://localhost/EventManagementSystem/change_password.php");
	    
	    //Logout
	    //driver.findElement(By.linkText("Logout")).click();
	    //driver.get("http://localhost/EventManagementSystem/logout.php");


	      
	}
}
