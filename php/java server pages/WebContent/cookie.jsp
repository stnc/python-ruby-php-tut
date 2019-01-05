
<%
	// Create cookies for first and last names.      
	Cookie firstName = new Cookie("first_name",
			request.getParameter("first_name"));
	Cookie lastName = new Cookie("last_name",
			request.getParameter("last_name"));

	// Set expiry date after 24 Hrs for both the cookies.
	firstName.setMaxAge(60 * 60 * 24);
	lastName.setMaxAge(60 * 60 * 24);

	// Add both the cookies in the response header.
	response.addCookie(firstName);
	response.addCookie(lastName);
%>
<html>
<head>
<title>Setting Cookies</title>
</head>
<body>
	<center>
		<h1>Setting Cookies</h1>
	</center>
	<%
		if (request.getParameter("kontrol") != null) {
			if (request.getParameter("kontrol").equals("gonder")) {
	%>
	<ul>
		<li><p>
				<b>First Name:</b>
				<%
					out.println(request.getParameter("first_name"));
				%>
			</p></li>
		<li><p>
				<b>Last Name:</b>
				<%=request.getParameter("last_name")%>
			</p></li>
	</ul>
	<a href="cookie.jsp">geri don</a>
	<%
		}
		} else {
	%>


	<form action="cookie.jsp" method="POST">
		<input type="hidden" value="gonder" name="kontrol"> First
		Name: <input type="text" name="first_name"> <br /> Last Name:
		<input type="text" name="last_name" /> <input type="submit"
			value="Submit" />
	</form>

	<%		} 	%>


</body>
</html>