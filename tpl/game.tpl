<h1>{$gamename}</h1>
<p>
    <table>
        <tr>
            <td valign="top">
                <center>
                    <p><img src="{$screen1}" class="ssmain"/></p>
                    <a href="{$screen1}" data-lightbox="ss"><img class="thumb" src="{$th_screen1}"/></a>
                    <a href="{$screen2}" data-lightbox="ss"><img class="thumb" src="{$th_screen2}"/></a>
                    <a href="{$screen3}" data-lightbox="ss"><img class="thumb" src="{$th_screen3}"/></a>
                </center>
               
                <p>{$longdesc}</p>
                <p><ul>{$bullets}</ul></p>
                    <center>
                        <a class="youtubelink" href="{$youtubelink}" target="_blank">Watch On Youtube</a>
                    </center>
                </p>
               
            </td>
            
            
            
            <td valign="top">
                <p>
                    <center>
                        <img src="{$feature_img}"/>
                    </center>
                </p>
                <p>{$shortdesc}<br/></p>
                
                
                <p>
                    Gamerank: {$gamerank}<br/>
                    Rel Date: {$releasedate}<br/>
                    {$playonline}
                </p>
                <p>
                    Tags:<br/>
                    {$taglist}
                </p>

            </td>
        </tr>
        <tr>
            <td  colspan="2">
                <h3>Buy {$gamename}</h3>
                <div>
                    <table class="buydowntbl">
                        <tr>
                             <td
                                style="
                                    float: right;
                                    background-color:#ccc;
                                    text-transform: uppercase;
                                    color:orange;font-weight: bold;
                                    width:75px;
                                    "><a href="{$buylink}">Buy</a></td>
                            <td
                                style="
                                    float: right;
                                    background-color:#000;
                                    text-transform: uppercase;
                                    color:orange;font-weight: bold;
                                    width:75px;
                                    ">{$price}</td>
                            
                        </tr>
                    </table>
                </div>                   
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h3>Download And Play {$gamename} For FREE!</h3>
              <div>
                    <table >
                        <tr>
                            <td
                                style="
                                    float: right;
                                    background-color:#ccc;
                                    text-transform: uppercase;
                                    color:orange;font-weight: bold;
                                    width:75px;
                                    "><a href="{$downloadlink}">Download</a></td>
                            <td
                                style="
                                    float:right;
                                    background-color:#000;
                                    text-transform: uppercase;
                                    color:orange;font-weight: bold;
                                    width:75px;
                                    ">FREE</td>
                             
                        </tr>
                    </table>
                </div>           
            </td>
        </tr>
    </table>
</p>
