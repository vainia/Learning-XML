<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fo="http://www.w3.org/1999/XSL/Format">
	<xsl:template match="/">
		<html>
			<head>
				<title>
					Wykaz zadluzenia
					&#160; -
					&#160;<xsl:value-of select="wykaz_zadluzenia/budynek/administrator" />
				</title>
				<style type="text/css">
					body {
						font-family: verdana;
						font-size: 14px;
						color: #333;
					}
					
					h1 {
						font-size: 1.5em;
						color: #339900;
					}
					
					h2 {
						font-size: 1.3em;
						color: #339900;
					}
					
					td, th {
						padding: 5px;
					}
					
					table thead th {
						background-color: silver;
						font-weight: normal;
						text-align: left;
					}
					
					.col1 {
						clear: left;
						float: left;
						width: 500px;
						margin-right: 10px;
						margin-bottom: 20px;
					}
					
					.col2 {
						float: left;
						width: 500px;
						margin-bottom: 20px;
					}
					
					.col12 {
						clear: left;
						width: 1010px;
						margin-bottom: 20px;
					}
					
					table.dane {
						width: 80%;
					}
					
					table.dane tbody td:first-child {
						font-weight: bold;
						background-color: #EFEFEF;
						width: 35%;
					}
				</style>
			</head>
			<body>
				<xsl:apply-templates select="wykaz_zadluzenia/budynek/dluznicy" />
			</body>
		</html>
	</xsl:template>

	
	<xsl:template match="wykaz_zadluzenia/budynek/dluznicy">
		<div class="col12">
			<h2>Dłużnicy</h2>
			
			<table class="">
				<thead>
					<tr>
						<th>Nr</th>
						<th>Lokal</th>
						<th>Imie</th>
						<th>Nazwisko</th>
						<th>Zadluzenie</th>
					</tr>
				</thead>
				<tbody>
					<xsl:apply-templates select="dluznik[zadluzenie&lt;245]" />		
				</tbody>
			</table>			
		</div>
	</xsl:template>


	
	<xsl:template match="wykaz_zadluzenia/budynek/dluznicy/dluznik">
				<tr>
					<td>
						<xsl:value-of select="@lp" />
					</td>
					<td>
						<xsl:value-of select="lokal" />
					</td>
					<td>
						<xsl:value-of select="imie" />
					</td>
					<td>
						<xsl:value-of select="nazwisko" />
					</td>
					<td>
						<xsl:value-of select="zadluzenie" />
					</td>
				</tr>
	</xsl:template>
	
	
	
</xsl:stylesheet>