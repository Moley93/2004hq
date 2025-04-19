<?php
function getGuideContent($guide) { return <<<HTML
<h2>$guide Treasure Trails Guide</h2>
<p>
<table class="calculators">
  <tr> 
    <th>Test your Knowledge Clues:</th>
    <th>Solution</th>
  </tr>
  <tr> 
    <td>19 to the power of 3</td>
    <td>6859</td>
  </tr>
  <tr> 
    <td>What is 57x89+23?</td>
    <td>5096</td>
  </tr>
  <tr> 
    <td>If x is 15 and y is 3, what is 3x + y?</td>
    <td>48</td>
  </tr>
  <tr> 
    <td>I have 16 kebabs, I eat one <br>
      myself and share the rest <br>
      equally between 3 friends <br>
      how many do they have each?</td>
    <td>5</td>
  </tr>
  <tr> 
    <td>How many cannons in Lumbridge Castle? </td>
    <td>9</td>
  </tr>
  <tr> 
    <td>How many animals in Zoo?</td>
    <td>32</td>
  </tr>
</table>
</p>
HTML; }