	<% Option Explicit %>
<% Response.Buffer = True %>

<%



Dim name, address, city, state, zip, hphone, wphone, cphone, email, additionalinformation, Mail




If Request("name") = "" OR  Request("address") = "" OR Request("city") = "" OR Request("state") = "" OR Request("zip") = ""  Then




Session("name") = Request.Form("name") 
Session("address") = Request.Form("address")
Session("city") = Request.Form("city")
Session("state") = Request.Form("state")
Session("zip") = Request.Form("zip") 
Session("hphone") = Request.Form("hphone")
Session("wphone") = Request.Form("wphone")
Session("cphone") = Request.Form("cphone")
Session("email") = Request.Form("email")
Session("additionalinformation") = Request.Form("additionalinformation")

Response.Redirect("http://www.stcroixtreeservice.com/RequestAQuote.html")
response.end

else 

name = Request.Form("name") 
address = Request.Form("address")
city = Request.Form("city")
state = Request.Form("state")
zip= Request.Form("zip") 
hphone = Request.Form("hphone")
wphone = Request.Form("wphone")
cphone = Request.Form("cphone")
email = Request.Form("email")
additionalinformation = Request.Form("additionalinformation")


'Set up Mailing
Set Mail=CreateObject("CDO.Message")
Mail.Subject= "Consult request from " &name&""
Mail.From="webleads@savatree.com"
Mail.To="estimates@stcroixtreeservice.com,mlee@savatree.com,lobrien@savatree.com"
'Mail.To="mlee@savatree.com"
Mail.HTMLBody = "<h2> Inquiry from St. Croix</h2><br>"&name&"<br><br>" &address&"<br>"&city&", "&state&","&zip&"<br><br>Home Phone:"&hphone&"<br>Work Phone:"&wphone&"<br>Cell Phone:"&cphone&"<br><br>"&email&"<br><br> Comment:<br>"&additionalinformation&""
Mail.Send
set Mail=nothing



' End Session Variables
Session("name") = ""
Session("address") = ""
Session("city") = ""
Session("state") = ""
Session("zip") = ""
Session("hphone") = ""
Session("wphone") = ""
Session("cphone") = ""
Session("email") = ""
Session("additionalinformation") = ""

Response.Redirect("http://www.stcroixtreeservice.com/thankyou.html")
response.end

end if






%>
