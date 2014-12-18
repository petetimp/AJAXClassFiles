<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
	<ul>
	<xsl:for-each select="beatles/beatle">
		<xsl:sort select="name/lastname"/>
		<li>
			<a href="{@link}">
				<xsl:value-of select="name/firstname"/>
				<xsl:text> </xsl:text>
				<xsl:value-of select="name/lastname"/>
			</a>
		</li>
	</xsl:for-each>
	</ul>
</xsl:template>

</xsl:stylesheet>
