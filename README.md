Everyone using fonts are familiar with the weight, width and postural (slant) attributes of a typeface family, and many professional typographers are familiar with fonts mastered for different optical size ranges. Traditionally some of the most common attributes are available as named font instances (or styles) within font families. These attributes are recorded in the font metadata fields of the OpenType v1.0 specification, along with other values in the OS/2 table (e.g. cap height and x-height.)

But these could not be altered by users, and this led to widespread simplification about how typography is formed from the attributes of typefaces. Users want to manipulate more parameters than static font formats contain, or applications could offer. The metadata that was available was mostly for Latin, and the users of other world scripts have found difficulties with more limited metadata, especially when mixing scripts on a page for print or digital media.

The variable fonts specification in the OpenType v1.8 font format changes that situation. We see the possibility to solve many typographic problems with it, if it includes a more in-depth and complete set of attributes that users can interact with, or adjust through programming.

OpenType variable fonts launched with registered axes that pertain to some of these attributes:
Width, weight, optical size. This proposal contains additional axes that are universal attributes, and also some specific to Latin. Those may be familiar to many users, such as cap height, and some may be less obvious, such as the vertical depth of descenders.

This primary set of axes for Latin are interrelated, and form a gestalt system. The system can be extended by other axes, not in this proposal, for all the world’s scripts. A Latin variable font with these axes can be adjusted to harmonize with a static font from any of those scripts. For example, such a font paired in a document with Chinese text can have multiple descender lengths, depending on whether Chinese or Latin is the primary script in a text run.
