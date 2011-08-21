<?php
/*
 * Copyright 2008 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

require_once "includes/header.php";
require_once "includes/displayBuzzPost.php";
require_once '../src/buzz.php';
require_once "includes/createBuzz.php";

$buzz = createBuzz();

$newPost = false;
if (isset($_POST['buzzPostContent'])) {
  $object = new buzzObject($_POST['buzzPostContent']);
  $post = buzzPost::createPost($object);
  $newPost = $buzz->createPost($post);
}

echo "	<div id=\"buzzStream\">
		<div class=\"buzzPost ui-corner-all\">
    		<form method=\"post\">
    			<b>Enter post text:</b><br>
    			<textarea name=\"buzzPostContent\" class=\"ui-corner-all\"></textarea><br>
    			<input type=\"submit\" value=\"Create post\">
    		</form>
		</div>";
if ($newPost) {
  echo "<br><span style=\"margin-left:12px; font-weight:bold\">New post has been created:</span><br/>";
  displayBuzzPost($buzz, $newPost);
}
echo "</div>\n";

include "includes/footer.php";
