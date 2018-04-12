<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
	<html>
		<body>
			<xsl:apply-templates select="zestawienia" />
		</body>
	</html>
</xsl:template>

<xsl:template match="zestawienia">
		<table width="500px" border="2">
			<tr>
				<th colspan="4" bgcolor="pink">KSIEGOWE</th>
			</tr>
			<xsl:apply-templates select="zestawienie[@typ = 'ks']">
				<xsl:sort select="okres" />
			</xsl:apply-templates>
			<tr>
				<th colspan="4" bgcolor="yellow">MARKETINGOWE</th>
			</tr>
			<xsl:apply-templates select="zestawienie[@typ = 'ma']">
				<xsl:sort select="okres" />
			</xsl:apply-templates>
			<tr>
				<th colspan="4" bgcolor="green">KASOWE</th>
			</tr>
			<xsl:apply-templates select="zestawienie[@typ = 'ka']">
				<xsl:sort select="okres" />
			</xsl:apply-templates>
		</table>
</xsl:template>

<xsl:template match="zestawienia/zestawienie">
	<tr>
		<td><xsl:value-of select="position()"/></td>
		<td align="center">
			<xsl:choose>
				<xsl:when test="@typ = 'ks'">KSIENGOWE</xsl:when>
				<xsl:when test="@typ = 'ka'">MARKETINGOWE</xsl:when>
				<xsl:when test="@typ = 'ma'">KASOWE</xsl:when>
				<xsl:otherwise>N/A</xsl:otherwise>
			</xsl:choose>
		</td>
		<td align="center"><xsl:value-of select="okres" /></td>
		<td align="center"><xsl:value-of select="tytul" /></td>
	</tr>
</xsl:template>

</xsl:stylesheet>
