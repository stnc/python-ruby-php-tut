<%@ page import="java.io.*,java.util.*"%>
<html>
<head>
<title>HTTP Header Request Example</title>
</head>
<body>

		<h2>HTTP Header Request Example</h2>
		<table width="100%" border="1" align="center">
			<tr bgcolor="#949494">
				<th>Header Name</th>
				<th>Header Value(s)</th>
			</tr>
			<%
				 Enumeration headerNames = request.getHeaderNames();
				while (headerNames.hasMoreElements()) {
					String paramName = (String) headerNames.nextElement();
					out.print("<tr><td>" + paramName + "</td>\n");
					String paramValue = request.getHeader(paramName);
					out.println("<td> " + paramValue + "</td></tr>\n");
				}
			%>
		</table>


<%
   // Set refresh, autoload time as 50 seconds
   response.setIntHeader("Refresh", 50);
   // Get current time
   Calendar calendar = new GregorianCalendar();
   String am_pm;
   int hour = calendar.get(Calendar.HOUR);
   int minute = calendar.get(Calendar.MINUTE);
   int second = calendar.get(Calendar.SECOND);
   if(calendar.get(Calendar.AM_PM) == 0)
      am_pm = "AM";
   else
      am_pm = "PM";
   String CT = hour+":"+ minute +":"+ second +" "+ am_pm;
   out.println("Current Time is: " + CT + "\n");
%>


<%--
   // Set error code and reason.
   response.sendError(411, "The \"Content-Length\" is not defined. The server will not accept the request without it." );
--%>


</body>
</html>