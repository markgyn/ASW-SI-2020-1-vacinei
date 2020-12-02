package org.ufg.vacinei.controller;

import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;
import java.security.Principal;

@RestController
public class AuthController {
	
	@GetMapping("/user")
	public ResponseEntity<Principal> me(Principal principal) {
		return ResponseEntity.ok(principal);
	}
}
