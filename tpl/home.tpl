<h1>Welcome to the Casual Game Station!</h1>

<table class="specials">
   <tr>
      <td colspan="2" class="specials_title">Current Specials</td>
   <tr>
   <tr>
      <td valign="top">{$dailyspecial}<p><a href="game/{$dailyspecialid}">Check it out</a></p></td>
      <td valign="top">{$weeklyspecial}<p><a href="game/{$weeklyspecialid}">Check it out</a></p></td>
   </tr>
   <tr>
      <td class="newtoday" colspan="2">
            <h3>New Arrival</h3><br/>
            <span class="new_gameTitle">{$gamename}</span><br/>
            <img class="images" src="{$feature_img}" align="left"/>
            {$longdesc}<p><a href="game/{$gameid}">more...</a></p>
      </td>
   </tr>
   
</table>