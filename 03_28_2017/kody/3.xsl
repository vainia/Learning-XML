<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <head>
                <title>Klient</title>
            </head>
            <body>
                <table width="1000" border="1">
                    <tbody>
                        <tr bgcolor="#006633" style="color: #fff">
                            <td align="center">Imie</td>
                            <td align="center">Nazwisko</td>
                            <td align="center">Data urodzenia</td>
                            <td align="center">Pesel</td>
                            <td align="center">Wiek</td>
                            <td align="center">Typ</td>
                            <td align="center">Zdjecie</td>
                        </tr>
                        <xsl:for-each select="klienci/klient">
                            <tr bgcolor="{kolor}">
                                <td align="center"><xsl:value-of select="imie"/></td>
                                <td align="center"><xsl:value-of select="nazwisko"/></td>
                                <td align="center"><xsl:value-of select="data_urodzenia"/></td>
                                <td align="center"><xsl:value-of select="pesel"/></td>
                                <td align="center"><xsl:value-of select="wiek"/></td>
                                <td align="center"><xsl:value-of select="@typ"/></td>
                                <td width="200"><img src="{zdjecie}" width="200" height="200"/></td>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
