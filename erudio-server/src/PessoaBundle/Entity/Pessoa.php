<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *    @author Municipio de Itajaí - Secretaria de Educação - DITEC         *
 *    @updated 30/06/2016                                                  *
 *    Pacote: Erudio                                                       *
 *                                                                         *
 *    Copyright (C) 2016 Prefeitura de Itajaí - Secretaria de Educação     *
 *                       DITEC - Diretoria de Tecnologias educacionais     *
 *                        ditec@itajai.sc.gov.br                           *
 *                                                                         *
 *    Este  programa  é  software livre, você pode redistribuí-lo e/ou     *
 *    modificá-lo sob os termos da Licença Pública Geral GNU, conforme     *
 *    publicada pela Free  Software  Foundation,  tanto  a versão 2 da     *
 *    Licença   como  (a  seu  critério)  qualquer  versão  mais  nova.    *
 *                                                                         *
 *    Este programa  é distribuído na expectativa de ser útil, mas SEM     *
 *    QUALQUER GARANTIA. Sem mesmo a garantia implícita de COMERCIALI-     *
 *    ZAÇÃO  ou  de ADEQUAÇÃO A QUALQUER PROPÓSITO EM PARTICULAR. Con-     *
 *    sulte  a  Licença  Pública  Geral  GNU para obter mais detalhes.     *
 *                                                                         *
 *    Você  deve  ter  recebido uma cópia da Licença Pública Geral GNU     *
 *    junto  com  este  programa. Se não, escreva para a Free Software     *
 *    Foundation,  Inc.,  59  Temple  Place,  Suite  330,  Boston,  MA     *
 *    02111-1307, USA.                                                     *
 *                                                                         *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

namespace PessoaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use JMS\Serializer\Annotation as JMS;
use CoreBundle\ORM\AbstractEditableEntity;
use AuthBundle\Entity\Usuario;


/**
* @ORM\Entity
* @ORM\Table(name = "sme_pessoa")
* @ORM\InheritanceType("JOINED")
* @ORM\DiscriminatorColumn(name = "tipo_pessoa", type = "string")
* @ORM\DiscriminatorMap({
*  "Pessoa" = "Pessoa", 
*  "PessoaFisica" = "PessoaFisica", 
*  "PessoaJuridica" = "PessoaJuridica",
*  "Instituicao" = "Instituicao",
*  "UnidadeEnsino" = "UnidadeEnsino"
* })
* @JMS\Discriminator(disabled = true)
*/
class Pessoa extends AbstractEditableEntity {
    
    /** 
    * @JMS\Groups({"LIST"})   
    * @ORM\Column
    */
    private $nome;
    
    /**
    * @JMS\Groups({"LIST"}) 
    * @ORM\Column(name = "cpf_cnpj", length = 14)
    */
    private $cpfCnpj;
    
    /**
    * @JMS\Groups({"LIST"}) 
    * @JMS\Type("DateTime<'Y-m-d'>")
    * @ORM\Column(name = "data_nascimento", type = "date") 
    */
    private $dataNascimento;
    
    /** 
    * @JMS\Groups({"LIST"})
    * @ORM\Column(nullable = true, length = 200) 
    */
    private $email;
    
    /** 
    * @JMS\Groups({"LIST"})  
    * @ORM\Column(type = "string", length = 1) 
    */
    private $genero;
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @ORM\ManyToOne(targetEntity = "Endereco")
    */
    private $endereco;
    
    /** 
     * @JMS\Groups({"DETAILS"})
     * @ORM\Column(name = "inep", nullable = true)
     */
    private $codigoInep;
    
    /** 
    * @JMS\Exclude
    * @ORM\OneToMany(targetEntity = "Telefone", mappedBy = "pessoa", fetch = "EXTRA_LAZY", cascade = {"all"}) 
    */
    private $telefones;
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @ORM\OneToOne(targetEntity="AuthBundle\Entity\Usuario", inversedBy="pessoa")
    * @ORM\JoinColumn(name="usuario_id")
    */
    private $usuario;
    
    function init() {
        $this->telefones = new ArrayCollection();
    }
    
    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }
    
    function getCodigoInep() {
        return $this->codigoInep;
    }
    
    function setCodigoInep($codigoInep) {
        $this->codigoInep = $codigoInep;
    }

    function getCpfCnpj() {
        return $this->cpfCnpj;
    }

    function setCpfCnpj($cpfCnpj) {
        $this->cpfCnpj = $cpfCnpj;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function setDataNascimento(\DateTime $dataNascimento = null) {
        $this->dataNascimento = $dataNascimento;
    }

    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
    function getGenero() {
        return $this->genero;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }
    
    function getEndereco() {
        return $this->endereco;
    }
    
    function setEndereco($endereco) {
        return $this->endereco = $endereco;
    }
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @JMS\VirtualProperty
    * @JMS\Type("ArrayCollection<PessoaBundle\Entity\Telefone>")
    */
    function getTelefones() {
        return $this->telefones->matching(
            Criteria::create()->where(Criteria::expr()->eq('ativo', true))
        );
    }
    
    function getUsuario() {
        return $this->usuario;
    }
    
    function setUsuario(Usuario $usuario) {
        $this->usuario = $usuario;
    }
    
}
