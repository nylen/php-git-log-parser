<?php
/**
 * -- tivie/php-git-log-parser --
 * Format.php created at 22-12-2014
 *
 * Copyright 2014 Estevão Soares dos Santos
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
 **/

namespace Tivie\GitLogParser;

use Tivie\GitLogParser\Exception\InvalidArgumentException;

/**
 * Class Format
 *
 * @package Tivie\GitLogParser
 */
class Format
{
    private $format;

    private static $phArray = array(
        "commitHash"                => '%H',
        "abbreviatedCommitHash"     => '%h',
        "treeHash"                  => "%T",
        "abbreviatedTreeHash"       => "%t",
        "parentHashes"              => "%P",
        "abbreviatedParentHashes"   => "%p",
        "authorName"                => "%an",
        "authorNameMailmap"         => "%aN",
        "authorEmail"               => "%ae",
        "authorEmailMailmap"        => "%aE",
        "authorDate"                => "%ad",
        "authorDateRFC2822"         => "%aD",
        "authorDateRelative"        => "%ar",
        "authorDateTimestamp"       => "%at",
        "authorDateISO8601"         => "%ai",
        "committerName"             => "%cn",
        "committerNameMailmap"      => "%cN",
        "committerEmail"            => "%ce",
        "committerEmailMailmap"     => "%cE",
        "committerDate"             => "%cd",
        "committerDateRFC2822"      => "%cD",
        "committerDateRelative"     => "%cr",
        "committerDateTimestamp"    => "%ct",
        "committerDateISO8601"      => "%ci",
        "refs"                      => "%d",
        "encoding"                  => "%e",
        "subject"                   => "%s",
        "sanitizedSubject"          => "%f",
        "body"                      => "%b",
        "rawBody"                   => "%B",
        "commitNotes"               => "%N",
        "rawGPGMsg"                 => "%GG",
        "signature"                 => "%G?",
        "signerName"                => "%GS",
        "signerKey"                 => "%GK",
        "reflog"                    => "%gD",
        "shortReflog"               => "%gd",
        "reflogName"                => "%gn",
        "reflogNameMailmap"         => "%gN",
        "reflogEmail"               => "%ge",
        "reflogEmailMailmap"        => "%gE",
        "reflogSubject"             => "%gs"
    );

    /**
     * Create a new Format object
     */
    public function __construct($fields = null)
    {
        if (empty($fields)) {
            $fields = array_keys(self::$phArray);
        }

        $format = '';
        foreach ($fields as $name) {
            if (isset(self::$phArray[$name])) {
                $field = self::$phArray[$name];
                $format .= "%x00$name=$field";
            }
        }

        $format .= '%x00END%x00';

        $this->format = $format;
    }

    /**
     * Get the format
     *
     * @return string
     */
    public function getFormatString()
    {
        return $this->format;
    }

    public function getPHArray()
    {
        return self::$phArray;
    }

    /**
     * Used when typecasting to string. Must return a valid string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->format;
    }
}
