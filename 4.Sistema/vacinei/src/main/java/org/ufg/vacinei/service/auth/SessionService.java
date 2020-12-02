package org.ufg.vacinei.service.auth;

import org.ufg.vacinei.model.User;

public interface SessionService {
	
	User getAuthenticatedUser();
	
	User authenticate();
	
}
