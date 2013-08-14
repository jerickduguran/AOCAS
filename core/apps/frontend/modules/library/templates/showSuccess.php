<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $general_library->getId() ?></td>
    </tr>
    <tr>
      <th>Client type:</th>
      <td><?php echo $general_library->getClientTypeId() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $general_library->getStatusId() ?></td>
    </tr>
    <tr>
      <th>Category:</th>
      <td><?php echo $general_library->getCategoryId() ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $general_library->getCode() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $general_library->getName() ?></td>
    </tr>
    <tr>
      <th>Building no:</th>
      <td><?php echo $general_library->getBuildingNo() ?></td>
    </tr>
    <tr>
      <th>Street 1:</th>
      <td><?php echo $general_library->getStreet1() ?></td>
    </tr>
    <tr>
      <th>Street 2:</th>
      <td><?php echo $general_library->getStreet2() ?></td>
    </tr>
    <tr>
      <th>City:</th>
      <td><?php echo $general_library->getCity() ?></td>
    </tr>
    <tr>
      <th>Postal code:</th>
      <td><?php echo $general_library->getPostalCode() ?></td>
    </tr>
    <tr>
      <th>Province:</th>
      <td><?php echo $general_library->getProvince() ?></td>
    </tr>
    <tr>
      <th>Country:</th>
      <td><?php echo $general_library->getCountryId() ?></td>
    </tr>
    <tr>
      <th>Attention:</th>
      <td><?php echo $general_library->getAttention() ?></td>
    </tr>
    <tr>
      <th>Position:</th>
      <td><?php echo $general_library->getPosition() ?></td>
    </tr>
    <tr>
      <th>Telephone no:</th>
      <td><?php echo $general_library->getTelephoneNo() ?></td>
    </tr>
    <tr>
      <th>Fax no:</th>
      <td><?php echo $general_library->getFaxNo() ?></td>
    </tr>
    <tr>
      <th>Mobile no:</th>
      <td><?php echo $general_library->getMobileNo() ?></td>
    </tr>
    <tr>
      <th>Tin:</th>
      <td><?php echo $general_library->getTin() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $general_library->getEmail() ?></td>
    </tr>
    <tr>
      <th>Rdo code:</th>
      <td><?php echo $general_library->getRdoCode() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $general_library->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $general_library->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('library/edit?id='.$general_library->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('library/index') ?>">List</a>
