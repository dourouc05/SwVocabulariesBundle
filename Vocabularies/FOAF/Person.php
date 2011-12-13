<?php

namespace Sw\VocabulariesBundle\Vocabularies\FOAF; 

/**
 * http://xmlns.com/foaf/0.1/Person
 *
 * @author Thibaut
 */
class Person
{
    private $_rdf = array(); 
    
    public function setTitle($title)
    {
        $this->_rdf['http://xmlns.com/foaf/0.1/title'] = array('value' => $title, 'type' => 'literal'); 
    }
    
    public function setName($name)
    {
        $this->_rdf['http://xmlns.com/foaf/0.1/name'] = array('value' => $name, 'type' => 'literal'); 
    }
    
    public function setGivenName($name)
    {
        $this->_rdf['http://xmlns.com/foaf/0.1/givenName'] = array('value' => $name, 'type' => 'literal'); 
    }
    
    public function setFamilyName($name)
    {
        $this->_rdf['http://xmlns.com/foaf/0.1/familyName'] = array('value' => $name, 'type' => 'literal'); 
    }
    
    public function setNickname($nick)
    {
        $this->_rdf['http://xmlns.com/foaf/0.1/nick'] = array('value' => $nick, 'type' => 'literal'); 
    }
    
    public function setDateOfBirth($date)
    {
        $this->_rdf['http://xmlns.com/foaf/0.1/dateOfBirth'] = array('value' => $date, 'type' => 'literal'); 
    }
    
    public function setDateOfBirthFromTimestamp($date)
    {
        $this->_rdf['http://xmlns.com/foaf/0.1/dateOfBirth'] = array('value' => date('Y-m-d', $date), 'type' => 'literal'); 
    }
    
    public function setMailbox($mbox)
    {
        $this->_rdf['http://xmlns.com/foaf/0.1/mbox'] = array('value' => $mbox, 'type' => 'literal'); 
    }
    
    /**
     * Returns the RDF/PHP version of the triples here
     */
    public function toTriples()
    {
        $ret = array();
        $ret['#'] = array();
        
        if(isset($this->_rdf['http://xmlns.com/foaf/0.1/name']))
            $ret['#']['http://purl.org/dc/elements/1.1/creator'] = array('type' => 'literal', 'value' => $this->_rdf['http://xmlns.com/foaf/0.1/name']);
        elseif(isset($this->_rdf['http://xmlns.com/foaf/0.1/givenName']) && isset($this->_rdf['http://xmlns.com/foaf/0.1/familyName']))
            $ret['#']['http://purl.org/dc/elements/1.1/creator'] = array('type' => 'literal', 'value' => $this->_rdf['http://xmlns.com/foaf/0.1/givenName'] . ' ' . $this->_rdf['http://xmlns.com/foaf/0.1/familyName']);
        
        $ret['#']['http://xmlns.com/foaf/0.1/maker'] = array('type' => 'bnode', 'value' => '_:person'); 
        
        $ret['_:person'] = $this->_rdf; 
        
        return $ret; 
    }
}