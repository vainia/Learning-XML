<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fo="http://www.w3.org/1999/XSL/Format">
	<xsl:template match="/">
		<html>
			<head>
				<title>
					CV
					&#160;<xsl:value-of select="cv/dane_osobowe/imie" />
					&#160;<xsl:value-of select="cv/dane_osobowe/nazwisko" />
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
				<h1>
					<xsl:value-of select="cv/dane_osobowe/imie" />
					&#160; <xsl:value-of select="cv/dane_osobowe/nazwisko" />
				</h1>
				
				<div class="col1">
					<table class="dane">
						<tr>
							<td>Ulica:</td>
							<td>
								<xsl:value-of select="cv/dane_osobowe/adres/ulica" />&#160; 
								<xsl:value-of select="cv/dane_osobowe/adres/numer" />
							</td>
						</tr>
						<tr>
							<td>Kod:</td>
							<td><xsl:value-of select="cv/dane_osobowe/adres/kod" /></td>
						</tr>
						<tr>
							<td>Miejscowość:</td>
							<td><xsl:value-of select="cv/dane_osobowe/adres/miejscowosc" /></td>
						</tr>
					</table>
				</div>

				<div class="col2">
					<table class="dane">
						<xsl:apply-templates select="cv/dane_osobowe/kontakt/pozycja" />
					</table>
				</div>

				<xsl:apply-templates select="cv/wyksztalcenie" />
				<xsl:apply-templates select="cv/doswiadczenie_zawodowe" />
				<xsl:apply-templates select="cv/szkolenia" />
			</body>
		</html>
	</xsl:template>

	<xsl:template match="cv/dane_osobowe/kontakt/pozycja">
		<tr>
			<xsl:choose>
				<xsl:when test="@typ='tel' or @typ='kom'">
					<td><xsl:value-of select="@typ" />:</td>
					<td><xsl:value-of select="." /></td>
				</xsl:when>
				<xsl:when test="@typ='zdjecie'">
					<td><xsl:value-of select="@typ" /></td>
					<td>
						<xsl:element name="img">
							<xsl:attribute name="src">
								<xsl:value-of select="current()" />
							</xsl:attribute>
						</xsl:element>
					</td>
				</xsl:when>
				<xsl:when test="@typ='mail'">
					<td><xsl:value-of select="@typ" />:</td>
					<td>
						<a href="mailto:{current()}">
							<xsl:value-of select="current()"/>
						</a>
					</td>
				</xsl:when>
			</xsl:choose>	
		</tr>
	</xsl:template>

	<xsl:template match="cv/wyksztalcenie">
		<div class="col12">
			<h2>Wykształcenie</h2>
			
			<table class="">
				<thead>
					<tr>
						<th>Okres</th>
						<th>Instytucja</th>
						<th>Dyplom</th>
					</tr>
				</thead>
				<tbody>
					<xsl:apply-templates select="pozycja[@do &lt; 2000]" />		
				</tbody>
			</table>			
		</div>
	</xsl:template>


	
	<xsl:template match="cv/wyksztalcenie/pozycja">
				<tr>
					<td>
						<xsl:value-of select="@od" />&#160;-&#160;<xsl:value-of select="@do" />
					</td>
					<td>
						<xsl:value-of select="instytucja" />
					</td>
					<td>
						<xsl:value-of select="dyplom" />
					</td>
				</tr>
	</xsl:template>
	
	
	
	<xsl:template match="cv/doswiadczenie_zawodowe">
		<div class="col12">
			<h2>Doswiadczenie zawodowe</h2>
			
			<table class="">
				<thead>
					<tr>
						<th>Okres</th>
						<th>Instytucja</th>
						<th>Stanowisko</th>
						<th>Obowiazky</th>
					</tr>
				</thead>
				<tbody>
					<xsl:apply-templates select="pozycja" />				
				</tbody>
			</table>			
		</div>
	</xsl:template>

	
	
	<xsl:template match="cv/doswiadczenie_zawodowe/pozycja">
				<tr>
					<td>
						<xsl:value-of select="@od" />&#160;-&#160;<xsl:value-of select="@do" />
					</td>
					<td>
						<xsl:value-of select="instytucja" />
					</td>
					<td>
						<xsl:value-of select="stanowisko" />
					</td>
					<td>
						<xsl:for-each select="obowiazki/pozycja">
							<xsl:value-of select="current()" />.
						</xsl:for-each>
					</td>
				</tr>	
	</xsl:template>
	
	
	
	<xsl:template match="cv/szkolenia">
		<div class="col12">
			<h2>Szkolenia</h2>
			
			<table class="">
				<thead>
					<tr>
						<th>Data</th>
						<th>Instytucja</th>
						<th>Nazwa</th>
						<th>Typ</th>
					</tr>
				</thead>
				<tbody>
					<xsl:apply-templates select="pozycja" />				
				</tbody>
			</table>			
		</div>
	</xsl:template>

	
	
	<xsl:template match="cv/szkolenia/pozycja">
				<tr>
					<td>
						<xsl:value-of select="@data" />
					</td>
					<td>
						<xsl:value-of select="instytucja" />
					</td>
					<td>
						<xsl:value-of select="nazwa" />
					</td>
					<td>
						<xsl:value-of select="typ" />
					</td>
				</tr>	
	</xsl:template>
	
</xsl:stylesheet>