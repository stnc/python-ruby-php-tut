<%@ page language="java" contentType="text/html; charset=ISO-8859-9"
	pageEncoding="ISO-8859-9"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9">
<title>class cagirma</title>
</head>
<body>
	http://www.tutorialspoint.com/jsp/jsp_actions.htm
	<jsp:useBean id="test" class="action.TestBean" />

	<jsp:setProperty name="test" property="message" value="sefr" />

	<p>Got message....</p>

	<jsp:getProperty name="test" property="message" />

	<jsp:element name="xmlElement">
<jsp:attribute name="xmlElementAttr">
   Value for the attribute
</jsp:attribute>
<jsp:body>
   Body for XML element
</jsp:body>
</jsp:element>
</body>
</html>