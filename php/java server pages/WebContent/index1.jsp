<%@ page language="java" contentType="text/html; charset=ISO-8859-9"
	pageEncoding="ISO-8859-9"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9">
<title>Insert title here</title>
</head>
<body>
	http://www.java2s.com/Code/Java/JSP/UsingjspInitandjspDestroy.htm
	<%!int number;

	public void jspInit() {
		number = 5;
	}%>
	<jsp:include page="include/date.jsp" flush="true" />
	<br>
	http://stackoverflow.com/questions/15717376/how-to-call-a-java-class-in-jsp-file
	<%@ page import="selman_.*,java.util.*,java.text.*"%>
	<br>
	<%
		TestJava t = new TestJava();
		out.println(t.test("Joy"));
	%>
	<br>
	<%
		out.println("The number is " + number + "<BR>");
	%>
	<br>
	<%
		out.println("Your IP address is " + request.getRemoteAddr());
	%>
	<br> Today's date:
	<%=(new java.util.Date()).toLocaleString()%>
	<br>
	<%
		Date dNow = new Date();
		SimpleDateFormat ft = new SimpleDateFormat(
				"E yyyy.MM.dd 'at' hh:mm:ss a zzz");
		out.print("<h2 align=\"center\">" + ft.format(dNow) + "</h2>");
	%>


	<%!int fontSize;%>

	<%
		while (fontSize <= 3) {
	%>
	<font color="green" size="<%=fontSize%>"> JSP Tutorial </font>
	<br />
	<%
		fontSize++;
		}
	%>
</body>
</html>