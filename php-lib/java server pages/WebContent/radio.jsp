<HTML>
    <HEAD>
        <TITLE>Submitting Radio Buttons</TITLE>
    </HEAD>
 
    <BODY>
        <H1>Submitting Radio Buttons</H1>
        <FORM ACTION="" METHOD="get">
             <INPUT TYPE="radio" NAME="radios" VALUE="radio1" CHECKED>
             Radio Button 1
            <BR>
            <INPUT TYPE="radio" NAME="radios" VALUE="radio2">
             Radio Button 2
            <BR>
            <INPUT TYPE="radio" NAME="radios" VALUE="radio3">
             Radio Button 3
            <BR>
            <INPUT TYPE="submit" VALUE="Submit">
        </FORM>


        <H1>Reading Radio Buttons</H1>
        <%
            if(request.getParameter("radios") != null) {
                if(request.getParameter("radios").equals("radio1")) {
                    out.println("Radio button 1 was selected.<BR>");
                }
                else {
                    out.println("Radio button 1 was not selected.<BR>");
                }
                if(request.getParameter("radios").equals("radio2")) {
                    out.println("Radio button 2 was selected.<BR>");
                }
                else {
                    out.println("Radio button 2 was not selected.<BR>");
                }
                if(request.getParameter("radios").equals("radio3")) {
                    out.println("Radio button 3 was selected.<BR>");
                }
                else {
                    out.println("Radio button 3 was not selected.<BR>");
                }
            }
        %>
        
        <%@ page session="false" %>
<%
   out.println("<code>out</code> is an <i>");
   out.println(out.getClass().getName());
   out.println("</i> object.");
%>
        
    </BODY>
</HTML>