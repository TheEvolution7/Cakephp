<?php
// This file was auto-generated from sdk-root/src/data/rds-data/2018-08-01/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-08-01', 'endpointPrefix' => 'rds-data', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'AWS RDS DataService', 'serviceId' => 'RDS Data', 'signatureVersion' => 'v4', 'signingName' => 'rds-data', 'uid' => 'rds-data-2018-08-01', ], 'operations' => [ 'ExecuteSql' => [ 'name' => 'ExecuteSql', 'http' => [ 'method' => 'POST', 'requestUri' => '/ExecuteSql', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ExecuteSqlRequest', ], 'output' => [ 'shape' => 'ExecuteSqlResponse', ], 'errors' => [ [ 'shape' => 'BadRequestException', ], [ 'shape' => 'ForbiddenException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'ServiceUnavailableError', ], ], ], ], 'shapes' => [ 'Boolean' => [ 'type' => 'boolean', 'box' => true, ], 'ForbiddenException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'exception' => true, 'error' => [ 'code' => 'ForbiddenException', 'httpStatusCode' => 403, 'senderFault' => true, ], ], 'Value' => [ 'type' => 'structure', 'members' => [ 'arrayValues' => [ 'shape' => 'ArrayValues', ], 'bigIntValue' => [ 'shape' => 'Long', ], 'bitValue' => [ 'shape' => 'Boolean', ], 'blobValue' => [ 'shape' => 'Blob', ], 'doubleValue' => [ 'shape' => 'Double', ], 'intValue' => [ 'shape' => 'Integer', ], 'isNull' => [ 'shape' => 'Boolean', ], 'realValue' => [ 'shape' => 'Float', ], 'stringValue' => [ 'shape' => 'String', ], 'structValue' => [ 'shape' => 'StructValue', ], ], ], 'SqlStatementResults' => [ 'type' => 'list', 'member' => [ 'shape' => 'SqlStatementResult', ], ], 'ColumnMetadataList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ColumnMetadata', ], ], 'ResultFrame' => [ 'type' => 'structure', 'members' => [ 'records' => [ 'shape' => 'Records', ], 'resultSetMetadata' => [ 'shape' => 'ResultSetMetadata', ], ], ], 'Long' => [ 'type' => 'long', 'box' => true, ], 'Row' => [ 'type' => 'list', 'member' => [ 'shape' => 'Value', ], ], 'String' => [ 'type' => 'string', ], 'ArrayValues' => [ 'type' => 'list', 'member' => [ 'shape' => 'Value', ], ], 'Float' => [ 'type' => 'float', 'box' => true, ], 'ExecuteSqlResponse' => [ 'type' => 'structure', 'required' => [ 'sqlStatementResults', ], 'members' => [ 'sqlStatementResults' => [ 'shape' => 'SqlStatementResults', ], ], ], 'SqlStatementResult' => [ 'type' => 'structure', 'members' => [ 'numberOfRecordsUpdated' => [ 'shape' => 'Long', ], 'resultFrame' => [ 'shape' => 'ResultFrame', ], ], ], 'ResultSetMetadata' => [ 'type' => 'structure', 'members' => [ 'columnCount' => [ 'shape' => 'Long', ], 'columnMetadata' => [ 'shape' => 'ColumnMetadataList', ], ], ], 'Records' => [ 'type' => 'list', 'member' => [ 'shape' => 'Record', ], ], 'ExecuteSqlRequest' => [ 'type' => 'structure', 'required' => [ 'awsSecretStoreArn', 'dbClusterOrInstanceArn', 'sqlStatements', ], 'members' => [ 'awsSecretStoreArn' => [ 'shape' => 'Arn', ], 'database' => [ 'shape' => 'DbName', ], 'dbClusterOrInstanceArn' => [ 'shape' => 'Arn', ], 'schema' => [ 'shape' => 'DbName', ], 'sqlStatements' => [ 'shape' => 'SqlStatement', ], ], ], 'Arn' => [ 'type' => 'string', 'max' => 1024, ], 'StructValue' => [ 'type' => 'structure', 'members' => [ 'attributes' => [ 'shape' => 'ArrayValues', ], ], ], 'BadRequestException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'exception' => true, 'error' => [ 'code' => 'BadRequestException', 'httpStatusCode' => 400, 'senderFault' => true, ], ], 'Blob' => [ 'type' => 'blob', ], 'SqlStatement' => [ 'type' => 'string', 'max' => 65536, ], 'Double' => [ 'type' => 'double', 'box' => true, ], 'ServiceUnavailableError' => [ 'type' => 'structure', 'members' => [], 'exception' => true, 'error' => [ 'code' => 'ServiceUnavailableError', 'httpStatusCode' => 503, 'fault' => true, ], ], 'ColumnMetadata' => [ 'type' => 'structure', 'members' => [ 'arrayBaseColumnType' => [ 'shape' => 'Integer', ], 'isAutoIncrement' => [ 'shape' => 'Boolean', ], 'isCaseSensitive' => [ 'shape' => 'Boolean', ], 'isCurrency' => [ 'shape' => 'Boolean', ], 'isSigned' => [ 'shape' => 'Boolean', ], 'label' => [ 'shape' => 'String', ], 'name' => [ 'shape' => 'String', ], 'nullable' => [ 'shape' => 'Integer', ], 'precision' => [ 'shape' => 'Integer', ], 'scale' => [ 'shape' => 'Integer', ], 'schemaName' => [ 'shape' => 'String', ], 'tableName' => [ 'shape' => 'String', ], 'type' => [ 'shape' => 'Integer', ], 'typeName' => [ 'shape' => 'String', ], ], ], 'Integer' => [ 'type' => 'integer', 'box' => true, ], 'DbName' => [ 'type' => 'string', 'max' => 64, ], 'Record' => [ 'type' => 'structure', 'members' => [ 'values' => [ 'shape' => 'Row', ], ], ], 'InternalServerErrorException' => [ 'type' => 'structure', 'members' => [], 'exception' => true, 'error' => [ 'code' => 'InternalServerErrorException', 'httpStatusCode' => 500, 'fault' => true, ], ], ],];
