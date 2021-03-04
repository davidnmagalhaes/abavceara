<?php
// This file was auto-generated from sdk-root/src/data/worklink/2018-09-25/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-09-25', 'endpointPrefix' => 'worklink', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'WorkLink', 'serviceFullName' => 'Amazon WorkLink', 'serviceId' => 'WorkLink', 'signatureVersion' => 'v4', 'signingName' => 'worklink', 'uid' => 'worklink-2018-09-25', ], 'operations' => [ 'AssociateDomain' => [ 'name' => 'AssociateDomain', 'http' => [ 'method' => 'POST', 'requestUri' => '/associateDomain', ], 'input' => [ 'shape' => 'AssociateDomainRequest', ], 'output' => [ 'shape' => 'AssociateDomainResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ResourceAlreadyExistsException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'AssociateWebsiteAuthorizationProvider' => [ 'name' => 'AssociateWebsiteAuthorizationProvider', 'http' => [ 'method' => 'POST', 'requestUri' => '/associateWebsiteAuthorizationProvider', ], 'input' => [ 'shape' => 'AssociateWebsiteAuthorizationProviderRequest', ], 'output' => [ 'shape' => 'AssociateWebsiteAuthorizationProviderResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ResourceAlreadyExistsException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'AssociateWebsiteCertificateAuthority' => [ 'name' => 'AssociateWebsiteCertificateAuthority', 'http' => [ 'method' => 'POST', 'requestUri' => '/associateWebsiteCertificateAuthority', ], 'input' => [ 'shape' => 'AssociateWebsiteCertificateAuthorityRequest', ], 'output' => [ 'shape' => 'AssociateWebsiteCertificateAuthorityResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ResourceAlreadyExistsException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'CreateFleet' => [ 'name' => 'CreateFleet', 'http' => [ 'method' => 'POST', 'requestUri' => '/createFleet', ], 'input' => [ 'shape' => 'CreateFleetRequest', ], 'output' => [ 'shape' => 'CreateFleetResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ResourceAlreadyExistsException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'DeleteFleet' => [ 'name' => 'DeleteFleet', 'http' => [ 'method' => 'POST', 'requestUri' => '/deleteFleet', ], 'input' => [ 'shape' => 'DeleteFleetRequest', ], 'output' => [ 'shape' => 'DeleteFleetResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'DescribeAuditStreamConfiguration' => [ 'name' => 'DescribeAuditStreamConfiguration', 'http' => [ 'method' => 'POST', 'requestUri' => '/describeAuditStreamConfiguration', ], 'input' => [ 'shape' => 'DescribeAuditStreamConfigurationRequest', ], 'output' => [ 'shape' => 'DescribeAuditStreamConfigurationResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'DescribeCompanyNetworkConfiguration' => [ 'name' => 'DescribeCompanyNetworkConfiguration', 'http' => [ 'method' => 'POST', 'requestUri' => '/describeCompanyNetworkConfiguration', ], 'input' => [ 'shape' => 'DescribeCompanyNetworkConfigurationRequest', ], 'output' => [ 'shape' => 'DescribeCompanyNetworkConfigurationResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'DescribeDevice' => [ 'name' => 'DescribeDevice', 'http' => [ 'method' => 'POST', 'requestUri' => '/describeDevice', ], 'input' => [ 'shape' => 'DescribeDeviceRequest', ], 'output' => [ 'shape' => 'DescribeDeviceResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'DescribeDevicePolicyConfiguration' => [ 'name' => 'DescribeDevicePolicyConfiguration', 'http' => [ 'method' => 'POST', 'requestUri' => '/describeDevicePolicyConfiguration', ], 'input' => [ 'shape' => 'DescribeDevicePolicyConfigurationRequest', ], 'output' => [ 'shape' => 'DescribeDevicePolicyConfigurationResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'DescribeDomain' => [ 'name' => 'DescribeDomain', 'http' => [ 'method' => 'POST', 'requestUri' => '/describeDomain', ], 'input' => [ 'shape' => 'DescribeDomainRequest', ], 'output' => [ 'shape' => 'DescribeDomainResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'DescribeFleetMetadata' => [ 'name' => 'DescribeFleetMetadata', 'http' => [ 'method' => 'POST', 'requestUri' => '/describeFleetMetadata', ], 'input' => [ 'shape' => 'DescribeFleetMetadataRequest', ], 'output' => [ 'shape' => 'DescribeFleetMetadataResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'DescribeIdentityProviderConfiguration' => [ 'name' => 'DescribeIdentityProviderConfiguration', 'http' => [ 'method' => 'POST', 'requestUri' => '/describeIdentityProviderConfiguration', ], 'input' => [ 'shape' => 'DescribeIdentityProviderConfigurationRequest', ], 'output' => [ 'shape' => 'DescribeIdentityProviderConfigurationResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'DescribeWebsiteCertificateAuthority' => [ 'name' => 'DescribeWebsiteCertificateAuthority', 'http' => [ 'method' => 'POST', 'requestUri' => '/describeWebsiteCertificateAuthority', ], 'input' => [ 'shape' => 'DescribeWebsiteCertificateAuthorityRequest', ], 'output' => [ 'shape' => 'DescribeWebsiteCertificateAuthorityResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'DisassociateDomain' => [ 'name' => 'DisassociateDomain', 'http' => [ 'method' => 'POST', 'requestUri' => '/disassociateDomain', ], 'input' => [ 'shape' => 'DisassociateDomainRequest', ], 'output' => [ 'shape' => 'DisassociateDomainResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'DisassociateWebsiteAuthorizationProvider' => [ 'name' => 'DisassociateWebsiteAuthorizationProvider', 'http' => [ 'method' => 'POST', 'requestUri' => '/disassociateWebsiteAuthorizationProvider', ], 'input' => [ 'shape' => 'DisassociateWebsiteAuthorizationProviderRequest', ], 'output' => [ 'shape' => 'DisassociateWebsiteAuthorizationProviderResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ResourceAlreadyExistsException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'DisassociateWebsiteCertificateAuthority' => [ 'name' => 'DisassociateWebsiteCertificateAuthority', 'http' => [ 'method' => 'POST', 'requestUri' => '/disassociateWebsiteCertificateAuthority', ], 'input' => [ 'shape' => 'DisassociateWebsiteCertificateAuthorityRequest', ], 'output' => [ 'shape' => 'DisassociateWebsiteCertificateAuthorityResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'ListDevices' => [ 'name' => 'ListDevices', 'http' => [ 'method' => 'POST', 'requestUri' => '/listDevices', ], 'input' => [ 'shape' => 'ListDevicesRequest', ], 'output' => [ 'shape' => 'ListDevicesResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'ListDomains' => [ 'name' => 'ListDomains', 'http' => [ 'method' => 'POST', 'requestUri' => '/listDomains', ], 'input' => [ 'shape' => 'ListDomainsRequest', ], 'output' => [ 'shape' => 'ListDomainsResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'ListFleets' => [ 'name' => 'ListFleets', 'http' => [ 'method' => 'POST', 'requestUri' => '/listFleets', ], 'input' => [ 'shape' => 'ListFleetsRequest', ], 'output' => [ 'shape' => 'ListFleetsResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'ListWebsiteAuthorizationProviders' => [ 'name' => 'ListWebsiteAuthorizationProviders', 'http' => [ 'method' => 'POST', 'requestUri' => '/listWebsiteAuthorizationProviders', ], 'input' => [ 'shape' => 'ListWebsiteAuthorizationProvidersRequest', ], 'output' => [ 'shape' => 'ListWebsiteAuthorizationProvidersResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'ListWebsiteCertificateAuthorities' => [ 'name' => 'ListWebsiteCertificateAuthorities', 'http' => [ 'method' => 'POST', 'requestUri' => '/listWebsiteCertificateAuthorities', ], 'input' => [ 'shape' => 'ListWebsiteCertificateAuthoritiesRequest', ], 'output' => [ 'shape' => 'ListWebsiteCertificateAuthoritiesResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'RestoreDomainAccess' => [ 'name' => 'RestoreDomainAccess', 'http' => [ 'method' => 'POST', 'requestUri' => '/restoreDomainAccess', ], 'input' => [ 'shape' => 'RestoreDomainAccessRequest', ], 'output' => [ 'shape' => 'RestoreDomainAccessResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'RevokeDomainAccess' => [ 'name' => 'RevokeDomainAccess', 'http' => [ 'method' => 'POST', 'requestUri' => '/revokeDomainAccess', ], 'input' => [ 'shape' => 'RevokeDomainAccessRequest', ], 'output' => [ 'shape' => 'RevokeDomainAccessResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'SignOutUser' => [ 'name' => 'SignOutUser', 'http' => [ 'method' => 'POST', 'requestUri' => '/signOutUser', ], 'input' => [ 'shape' => 'SignOutUserRequest', ], 'output' => [ 'shape' => 'SignOutUserResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'UpdateAuditStreamConfiguration' => [ 'name' => 'UpdateAuditStreamConfiguration', 'http' => [ 'method' => 'POST', 'requestUri' => '/updateAuditStreamConfiguration', ], 'input' => [ 'shape' => 'UpdateAuditStreamConfigurationRequest', ], 'output' => [ 'shape' => 'UpdateAuditStreamConfigurationResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'UpdateCompanyNetworkConfiguration' => [ 'name' => 'UpdateCompanyNetworkConfiguration', 'http' => [ 'method' => 'POST', 'requestUri' => '/updateCompanyNetworkConfiguration', ], 'input' => [ 'shape' => 'UpdateCompanyNetworkConfigurationRequest', ], 'output' => [ 'shape' => 'UpdateCompanyNetworkConfigurationResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'UpdateDevicePolicyConfiguration' => [ 'name' => 'UpdateDevicePolicyConfiguration', 'http' => [ 'method' => 'POST', 'requestUri' => '/updateDevicePolicyConfiguration', ], 'input' => [ 'shape' => 'UpdateDevicePolicyConfigurationRequest', ], 'output' => [ 'shape' => 'UpdateDevicePolicyConfigurationResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'UpdateDomainMetadata' => [ 'name' => 'UpdateDomainMetadata', 'http' => [ 'method' => 'POST', 'requestUri' => '/updateDomainMetadata', ], 'input' => [ 'shape' => 'UpdateDomainMetadataRequest', ], 'output' => [ 'shape' => 'UpdateDomainMetadataResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'UpdateFleetMetadata' => [ 'name' => 'UpdateFleetMetadata', 'http' => [ 'method' => 'POST', 'requestUri' => '/UpdateFleetMetadata', ], 'input' => [ 'shape' => 'UpdateFleetMetadataRequest', ], 'output' => [ 'shape' => 'UpdateFleetMetadataResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], 'UpdateIdentityProviderConfiguration' => [ 'name' => 'UpdateIdentityProviderConfiguration', 'http' => [ 'method' => 'POST', 'requestUri' => '/updateIdentityProviderConfiguration', ], 'input' => [ 'shape' => 'UpdateIdentityProviderConfigurationRequest', ], 'output' => [ 'shape' => 'UpdateIdentityProviderConfigurationResponse', ], 'errors' => [ [ 'shape' => 'UnauthorizedException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], ], ], ], 'shapes' => [ 'AcmCertificateArn' => [ 'type' => 'string', 'pattern' => 'arn:[\\w+=/,.@-]+:[\\w+=/,.@-]+:[\\w+=/,.@-]*:[0-9]+:[\\w+=,.@-]+(/[\\w+=/,.@-]+)*', ], 'AssociateDomainReque��vv@V  ��vv@V                  ��u@V          PLhv@V  (�vv@V          �vv@V   @      �vv@V          rs' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'DomainName' => [ 'shape' => 'DomainName', ], 'DisplayName' => [ 'shape' => 'DisplayName', ], 'AcmCertificateArn' => [ 'shape' => 'AcmCertificateArn', ], ], ], 'AssociateDomainResponse' => [ 'type' => 'structure', 'members' => [], ], 'AssociateWebsiteAuthorizationProviderRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', 'AuthorizationProviderType', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'AuthorizationProviderType' => [ 'shape' => 'AuthorizationProviderType', ], 'DomainName' => [ 'shape' => 'DomainName', ], ], ], 'AssociateWebsiteAuthorizationProviderResponse' => [ 'type' => 'structure', 'members' => [ 'AuthorizationProviderId' => [ 'shape' => 'Id', ], ], ], 'AssociateWebsiteCertificateAuthorityRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', 'Certificate', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'Certificate' => [ 'shape' => 'Certificate', ], 'DisplayName' => [ 'shape' => 'DisplayName', ], ], ], 'AssociateWebsiteCertificateAuthorityResponse' => [ 'type' => 'structure', 'members' => [ 'WebsiteCaId' => [ 'shape' => 'Id', ], ], ], 'AuditStreamArn' => [ 'type' => 'string', ], 'AuthorizationProviderType' => [ 'type' => 'string', 'enum' => [ 'SAML', ], ], 'Boolean' => [ 'type' => 'boolean', ], 'Certificate' => [ 'type' => 'string', 'max' => 8192, 'min' => 1, 'pattern' => '-{5}BEGIN CERTIFICATE-{5}\\u000D?\\u000A([A-Za-z0-9/+]{64}\\u000D?\\u000A)*[A-Za-z0-9/+]{1,64}={0,2}\\u000D?\\u000A-{5}END CERTIFICATE-{5}(\\u000D?\\u000A)?', ], 'CertificateChain' => [ 'type' => 'string', 'max' => 32768, 'min' => 1, 'pattern' => '(-{5}BEGIN CERTIFICATE-{5}\\u000D?\\u000A([A-Za-z0-9/+]{64}\\u000D?\\u000A)*[A-Za-z0-9/+]{1,64}={0,2}\\u000D?\\u000A-{5}END CERTIFICATE-{5}\\u000D?\\u000A)*-{5}BEGIN CERTIFICATE-{5}\\u000D?\\u000A([A-Za-z0-9/+]{64}\\u000D?\\u000A)*[A-Za-z0-9/+]{1,64}={0,2}\\u000D?\\u000A-{5}END CERTIFICATE-{5}(\\u000D?\\u000A)?', ], 'CompanyCode' => [ 'type' => 'string', 'max' => 32, 'min' => 1, ], 'CreateFleetRequest' => [ 'type' => 'structure', 'required' => [ 'FleetName', ], 'members' => [ 'FleetName' => [ 'shape' => 'FleetName', ], 'DisplayName' => [ 'shape' => 'DisplayName', ], 'OptimizeForEndUserLocation' => [ 'shape' => 'Boolean', ], ], ], 'CreateFleetResponse' => [ 'type' => 'structure', 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], ], ], 'DateTime' => [ 'type' => 'timestamp', ], 'DeleteFleetRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], ], ], 'DeleteFleetResponse' => [ 'type' => 'structure', 'members' => [], ], 'DescribeAuditStreamConfigurationRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], ], ], 'DescribeAuditStreamConfigurationResponse' => [ 'type' => 'structure', 'members' => [ 'AuditStreamArn' => [ 'shape' => 'AuditStreamArn', ], ], ], 'DescribeCompanyNetworkConfigurationRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], ], ], 'DescribeCompanyNetworkConfigurationResponse' => [ 'type' => 'structure', 'members' => [ 'VpcId' => [ 'shape' => 'VpcId', ], 'SubnetIds' => [ 'shape' => 'SubnetIds', ], 'SecurityGroupIds' => [ 'shape' => 'SecurityGroupIds', ], ], ], 'DescribeDevicePolicyConfigurationRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], ], ], 'DescribeDevicePolicyConfigurationResponse' => [ 'type' => 'structure', 'members' => [ 'DeviceCaCertificate' => [ 'shape' => 'Certificate', ], ], ], 'DescribeDeviceRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', 'DeviceId', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'DeviceId' => [ 'shape' => 'Id', ], ], ], 'DescribeDeviceResponse' => [ 'type' => 'structure', 'members' => [ 'Status' => [ 'shape' => 'DeviceStatus', ], 'Model' => [ 'shape' => 'DeviceModel', ], 'Manufacturer' => [ 'shape' => 'DeviceManufacturer', ], 'OperatingSystem' => [ 'shape' => 'DeviceOperatingSystemName', ], 'OperatingSystemVersion' => [ 'shape' => 'DeviceOperatingSystemVersion', ], 'PatchLevel' => [ 'shape' => 'DevicePatchLevel', ], 'FirstAccessedTime' => [ 'shape' => 'DateTime', ], 'LastAccessedTime' => [ 'shape' => 'DateTime', ], 'Username' => [ 'shape' => 'Username', ], ], ], 'DescribeDomainRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', 'DomainName', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'DomainName' => [ 'shape' => 'DomainName', ], ], ], 'DescribeDomainResponse' => [ 'type' => 'structure', 'members' => [ 'DomainName' => [ 'shape' => 'DomainName', ], 'DisplayName' => [ 'shape' => 'DisplayName', ], 'CreatedTime' => [ 'shape' => 'DateTime', ], 'DomainStatus' => [ 'shape' => 'DomainStatus', ], 'AcmCertificateArn' => [ 'shape' => 'AcmCertificateArn', ], ], ], 'DescribeFleetMetadataRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], ], ], 'DescribeFleetMetadataResponse' => [ 'type' => 'structure', 'members' => [ 'CreatedTime' => [ 'shape' => 'DateTime', ], 'LastUpdatedTime' => [ 'shape' => 'DateTime', ], 'FleetName' => [ 'shape' => 'FleetName', ], 'DisplayName' => [ 'shape' => 'DisplayName', ], 'OptimizeForEndUserLocation' => [ 'shape' => 'Boolean', ], 'CompanyCode' => [ 'shape' => 'CompanyCode', ], 'FleetStatus' => [ 'shape' => 'FleetStatus', ], ], ], 'DescribeIdentityProviderConfigurationRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], ], ], 'DescribeIdentityProviderConfigurationResponse' => [ 'type' => 'structure', 'members' => [ 'IdentityProviderType' => [ 'shape' => 'IdentityProviderType', ], 'ServiceProviderSamlMetadata' => [ 'shape' => 'SamlMetadata', ], 'IdentityProviderSamlMetadata' => [ 'shape' => 'SamlMetadata', ], ], ], 'DescribeWebsiteCertificateAuthorityRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', 'WebsiteCaId', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'WebsiteCaId' => [ 'shape' => 'Id', ], ], ], 'DescribeWebsiteCertificateAuthorityResponse' => [ 'type' => 'structure', 'members' => [ 'Certificate' => [ 'shape' => 'Certificate', ], 'CreatedTime' => [ 'shape' => 'DateTime', ], 'DisplayName' => [ 'shape' => 'DisplayName', ], ], ], 'DeviceManufacturer' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'DeviceModel' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'DeviceOperatingSystemName' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'DeviceOperatingSystemVersion' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'DevicePatchLevel' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'DeviceStatus' => [ 'type' => 'string', 'enum' => [ 'ACTIVE', 'SIGNED_OUT', ], ], 'DeviceSummary' => [ 'type' => 'structure', 'members' => [ 'DeviceId' => [ 'shape' => 'Id', ], 'DeviceStatus' => [ 'shape' => 'DeviceStatus', ], ], ], 'DeviceSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'DeviceSummary', ], ], 'DisassociateDomainRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', 'DomainName', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'DomainName' => [ 'shape' => 'DomainName', ], ], ], 'DisassociateDomainResponse' => [ 'type' => 'structure', 'members' => [], ], 'DisassociateWebsiteAuthorizationProviderRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', 'AuthorizationProviderId', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'AuthorizationProviderId' => [ 'shape' => 'Id', ], ], ], 'DisassociateWebsiteAuthorizationProviderResponse' => [ 'type' => 'structure', 'members' => [], ], 'DisassociateWebsiteCertificateAuthorityRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', 'WebsiteCaId', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'WebsiteCaId' => [ 'shape' => 'Id', ], ], ], 'DisassociateWebsiteCertificateAuthorityResponse' => [ 'type' => 'structure', 'members' => [], ], 'DisplayName' => [ 'type' => 'string', 'max' => 100, ], 'DomainName' => [ 'type' => 'string', 'max' => 253, 'min' => 1, 'pattern' => '^[a-zA-Z0-9]?((?!-)([A-Za-z0-9-]*[A-Za-z0-9])\\.)+[a-zA-Z0-9]+$', ], 'DomainStatus' => [ 'type' => 'string', 'enum' => [ 'PENDING_VALIDATION', 'ASSOCIATING', 'ACTIVE', 'INACTIVE', 'DISASSOCIATING', 'DISASSOCIATED', 'FAILED_TO_ASSOCIATE', 'FAILED_TO_DISASSOCIATE', ], ], 'DomainSummary' => [ 'type' => 'structure', 'required' => [ 'DomainName', 'CreatedTime', 'DomainStatus', ], 'members' => [ 'DomainName' => [ 'shape' => 'DomainName', ], 'DisplayName' => [ 'shape' => 'DisplayName', ], 'CreatedTime' => [ 'shape' => 'DateTime', ], 'DomainStatus' => [ 'shape' => 'DomainStatus', ], ], ], 'DomainSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'DomainSummary', ], ], 'ExceptionMessage' => [ 'type' => 'string', ], 'FleetArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 20, ], 'FleetName' => [ 'type' => 'string', 'max' => 48, 'min' => 1, 'pattern' => '^[a-z0-9](?:[a-z0-9\\-]{0,46}[a-z0-9])?$', ], 'FleetStatus' => [ 'type' => 'string', 'enum' => [ 'CREATING', 'ACTIVE', 'DELETING', 'DELETED', 'FAILED_TO_CREATE', 'FAILED_TO_DELETE', ], ], 'FleetSummary' => [ 'type' => 'structure', 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'CreatedTime' => [ 'shape' => 'DateTime', ], 'LastUpdatedTime' => [ 'shape' => 'DateTime', ], 'FleetName' => [ 'shape' => 'FleetName', ], 'DisplayName' => [ 'shape' => 'DisplayName', ], 'CompanyCode' => [ 'shape' => 'CompanyCode', ], 'FleetStatus' => [ 'shape' => 'FleetStatus', ], ], ], 'FleetSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'FleetSummary', ], ], 'Id' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'IdentityProviderType' => [ 'type' => 'string', 'enum' => [ 'SAML', ], ], 'InternalServerErrorException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ExceptionMessage', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, ], 'InvalidRequestException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ExceptionMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'ListDevicesRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'NextToken' => [ 'shape' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], ], ], 'ListDevicesResponse' => [ 'type' => 'structure', 'members' => [ 'Devices' => [ 'shape' => 'DeviceSummaryList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListDomainsRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'NextToken' => [ 'shape' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], ], ], 'ListDomainsResponse' => [ 'type' => 'structure', 'members' => [ 'Domains' => [ 'shape' => 'DomainSummaryList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListFleetsRequest' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], ], ], 'ListFleetsResponse' => [ 'type' => 'structure', 'members' => [ 'FleetSummaryList' => [ 'shape' => 'FleetSummaryList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListWebsiteAuthorizationProvidersRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'NextToken' => [ 'shape' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], ], ], 'ListWebsiteAuthorizationProvidersResponse' => [ 'type' => 'structure', 'members' => [ 'WebsiteAuthorizationProviders' => [ 'shape' => 'WebsiteAuthorizationProvidersSummaryList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListWebsiteCertificateAuthoritiesRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListWebsiteCertificateAuthoritiesResponse' => [ 'type' => 'structure', 'members' => [ 'WebsiteCertificateAuthorities' => [ 'shape' => 'WebsiteCaSummaryList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'MaxResults' => [ 'type' => 'integer', 'min' => 1, ], 'NextToken' => [ 'type' => 'string', 'max' => 4096, 'min' => 1, 'pattern' => '[\\w\\-]+', ], 'ResourceAlreadyExistsException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ExceptionMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ExceptionMessage', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'RestoreDomainAccessRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', 'DomainName', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'DomainName' => [ 'shape' => 'DomainName', ], ], ], 'RestoreDomainAccessResponse' => [ 'type' => 'structure', 'members' => [], ], 'RevokeDomainAccessRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', 'DomainName', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'DomainName' => [ 'shape' => 'DomainName', ], ], ], 'RevokeDomainAccessResponse' => [ 'type' => 'structure', 'members' => [], ], 'SamlMetadata' => [ 'type' => 'string', 'max' => 204800, 'min' => 1, ], 'SecurityGroupId' => [ 'type' => 'string', 'pattern' => '^sg-([0-9a-f]{8}|[0-9a-f]{17})$', ], 'SecurityGroupIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'SecurityGroupId', ], 'max' => 5, ], 'SignOutUserRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', 'Username', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'Username' => [ 'shape' => 'Username', ], ], ], 'SignOutUserResponse' => [ 'type' => 'structure', 'members' => [], ], 'SubnetId' => [ 'type' => 'string', 'pattern' => '^subnet-([0-9a-f]{8}|[0-9a-f]{17})$', ], 'SubnetIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'SubnetId', ], ], 'TooManyRequestsException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ExceptionMessage', ], ], 'error' => [ 'httpStatusCode' => 429, ], 'exception' => true, ], 'UnauthorizedException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ExceptionMessage', ], ], 'error' => [ 'httpStatusCode' => 403, ], 'exception' => true, ], 'UpdateAuditStreamConfigurationRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'AuditStreamArn' => [ 'shape' => 'AuditStreamArn', ], ], ], 'UpdateAuditStreamConfigurationResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateCompanyNetworkConfigurationRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', 'VpcId', 'SubnetIds', 'SecurityGroupIds', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'VpcId' => [ 'shape' => 'VpcId', ], 'SubnetIds' => [ 'shape' => 'SubnetIds', ], 'SecurityGroupIds' => [ 'shape' => 'SecurityGroupIds', ], ], ], 'UpdateCompanyNetworkConfigurationResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateDevicePolicyConfigurationRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'DeviceCaCertificate' => [ 'shape' => 'CertificateChain', ], ], ], 'UpdateDevicePolicyConfigurationResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateDomainMetadataRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', 'DomainName', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'DomainName' => [ 'shape' => 'DomainName', ], 'DisplayName' => [ 'shape' => 'DisplayName', ], ], ], 'UpdateDomainMetadataResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateFleetMetadataRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'DisplayName' => [ 'shape' => 'DisplayName', ], 'OptimizeForEndUserLocation' => [ 'shape' => 'Boolean', ], ], ], 'UpdateFleetMetadataResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateIdentityProviderConfigurationRequest' => [ 'type' => 'structure', 'required' => [ 'FleetArn', 'IdentityProviderType', ], 'members' => [ 'FleetArn' => [ 'shape' => 'FleetArn', ], 'IdentityProviderType' => [ 'shape' => 'IdentityProviderType', ], 'IdentityProviderSamlMetadata' => [ 'shape' => 'SamlMetadata', ], ], ], 'UpdateIdentityProviderConfigurationResponse' => [ 'type' => 'structure', 'members' => [], ], 'Username' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'VpcId' => [ 'type' => 'string', 'pattern' => '^vpc-([0-9a-f]{8}|[0-9a-f]{17})$', ], 'WebsiteAuthorizationProviderSummary' => [ 'type' => 'structure', 'required' => [ 'AuthorizationProviderType', ], 'members' => [ 'AuthorizationProviderId' => [ 'shape' => 'Id', ], 'AuthorizationProviderType' => [ 'shape' => 'AuthorizationProviderType', ], 'DomainName' => [ 'shape' => 'DomainName', ], 'CreatedTime' => [ 'shape' => 'DateTime', ], ], ], 'WebsiteAuthorizationProvidersSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'WebsiteAuthorizationProviderSummary', ], ], 'WebsiteCaSummary' => [ 'type' => 'structure', 'members' => [ 'WebsiteCaId' => [ 'shape' => 'Id', ], 'CreatedTime' => [ 'shape' => 'DateTime', ], 'DisplayName' => [ 'shape' => 'DisplayName', ], ], ], 'WebsiteCaSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'WebsiteCaSummary', ], ], ],];
